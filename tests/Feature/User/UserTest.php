<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch users using GET
     *
     * @return void
     */
    public function test_can_fetch_users()
    {
        User::factory()->create();
        $response = $this->get('v1/users');
        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
            
    }

    /**
     * A basic feature test can create a user .
     *
     * @return void
     */
    public function test_can_create_a_user()
    {        
        //$data = @json_decode(json_encode(User::Factory()->create()), true);
        $data = $this->userData();
        $response = $this->post('v1/users', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single user using GET.
     *
     * @return void
     */
    public function test_can_get_a_user()
    {         
        User::factory()->create(); 
        $user = User::first();
        $response = $this->get('v1/users/'.$user->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update a user using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_user()
    {       
        $user = User::factory()->create(['email'=>'orignal@email.com']);

        $newEmail = 'new@email.com';
        $userData = $user->toArray();
        $userData['email'] = $newEmail;

        //$updateData= @json_decode(json_encode($user), true);
        $response = $this->json('PUT', 'v1/users/'.$user->id, $userData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);
        $this->assertEquals($newEmail, $response['data']['email']);                 
    }
    
    /**
     * A basic feature test can soft delete a user using DELETE.
     *
     * @return void
     */
    public function test_can_softdelete_user()
    {       
        User::factory()->create();
        $user = User::first();
        
        $response = $this->json('DELETE', 'v1/users/'.$user->id); 
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                  
    }

     /**
     * A basic feature test can parmanently delete user using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_user()
    {       
        User::factory()->create();
        $user = User::first();
        
        $this->json('DELETE', 'v1/users/'.$user->id); 
        $response = $this->get( 'v1/user-parmanently-delete/'.$user->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

    private function userData()
    {

        return [
            'full_name'=>'John Doe',
            'email'=>'email@example.com',
            'phone'=>'0790643963',
            'password' => 'strongPASSWORD@!',
            'password_again' => 'strongPASSWORD@!',            
        ];
    }
    

}
