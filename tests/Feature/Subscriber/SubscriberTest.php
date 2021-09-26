<?php

namespace Tests\Feature\Subscriber;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Subscriber;

class SubscriberTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch subscribers using GET
     *
     * @return void
     */
    public function test_can_fetch_subscribers()
    {
        Subscriber::factory()->create();
        $response = $this->get('v1/subscriber')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create a subscriber .
     *
     * @return void
     */
    public function test_can_create_a_subscriber()
    {        
        $data = $this->subscriberData();
        $response = $this->post('v1/subscriber', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single subscriber using GET.
     *
     * @return void
     */
    public function test_can_get_a_subscriber()
    {         
        Subscriber::factory()->create(); 
        $subscriber = Subscriber::first();
        $response = $this->get('v1/subscriber/'.$subscriber->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update a subscriber using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_subscriber()
    {       
        $subscriber = Subscriber::factory()->create(['full_name' => 'Name 1']);
        $newName = 'Name 2';

        $updateData= $subscriber->toArray();
        $updateData['full_name'] = $newName;

        $response = $this->json('PUT', 'v1/subscriber/'.$subscriber->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);   
        $this->assertEquals($newName, $response['data']['full_name']);                  
    }
    
     /**
     * A basic feature test can soft delete a subscriber using DELETE.
     *
     * @return void
     */
    public function test_can_softdelete_subscriber()
    {       
        Subscriber::factory()->create();
        $subscriber = Subscriber::first();
        
        $response = $this->json('DELETE', 'v1/subscriber/'.$subscriber->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete subscriber using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_subscriber()
    {       
        Subscriber::factory()->create();
        $subscriber = Subscriber::first();
        
        $this->json('DELETE', 'v1/subscriber/'.$subscriber->id); 
        $response = $this->get( 'v1/subscriber-parmanently-delete/'.$subscriber->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

    private function subscriberData()
    {
       return [
            'full_name'=>'John Doe',
            'email'=>'email@example.com',
            'phone'=>'0790643963',
            'password' => 'strongPASSWORD@1',
       ];
    }
    
}
