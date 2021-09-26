<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Admin;
use App\Models\User;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch admins using GET
     *
     * @return void
     */
    public function test_can_fetch_admins()
    {
        Admin::factory()->create();
        $response = $this->get('v1/admin')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create an admin .
     *
     * @return void
     */
    public function test_can_create_admin(){
        $user = User::factory()->create();
        //$data = @json_decode(json_encode(Admin::Factory()->create()), true); 
        $data = $this->adminData();
        $data['user_id'] =  $user->id;
        $response = $this->post('v1/admin', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single admin using GET.
     *
     * @return void
     */
    public function test_can_get_admin()
    {         
        Admin::factory()->create(); 
        $admin = Admin::first();
        $response = $this->get('v1/admin/'.$admin->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update an admin using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_admin()
    {       
        
        $admin = Admin::factory()->create(['work_email' => 'original@email.com']);

        $updateData= @json_decode(json_encode($admin), true);
        $newEmail = 'new@email.com';
        $updateData['work_email'] = $newEmail;

        $response = $this->json('PUT', 'v1/admin/'.$admin->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);
                    
        $this->assertEquals($newEmail, $response['data']['work_email']);
    }
    
     /**
     * A basic feature test can delete admin using DELETE.
     *
     * @return void
     */
    public function test_can_soft_delete_admin()
    {       
        Admin::factory()->create();
        $admin = Admin::first();
        
        $response = $this->json('DELETE', 'v1/admin/'.$admin->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete admin using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_admin()
    {       
        Admin::factory()->create();
        $admin = Admin::first();
        
        $this->json('DELETE', 'v1/admin/'.$admin->id); 
        $response = $this->get( 'v1/admin-parmanently-delete/'.$admin->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

    private function adminData()
    {
        return [
            'work_email' => 'email@example.com',
            'work_phone' => '0790643963',
        ];
    }
    
}
