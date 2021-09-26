<?php

namespace Tests\Feature\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Customer;
use App\Models\User;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch customers using GET
     *
     * @return void
     */
    public function test_can_fetch_customers()
    {
        Customer::factory()->create();
        $response = $this->get('v1/customer')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create an customer .
     *
     * @return void
     */
    public function test_can_create_customer()
    {        
        //$data = @json_decode(json_encode(Customer::Factory()->create()), true); 
        $user = User::factory()->create();
        $data = ['user_id' => $user->id];
        $response = $this->post('v1/customer', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single customer using GET.
     *
     * @return void
     */
    public function test_can_get_a_customer()
    {         
        Customer::factory()->create(); 
        $customer = Customer::first();
        $response = $this->get('v1/customer/'.$customer->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update an customer using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_customer()
    {       
        $customer = Customer::Factory()->create(['card_no' => '10']);

        $newLoyaltyPoints = '20';
        $updateData = $customer->toArray();
        $updateData['card_no'] = $newLoyaltyPoints;
        $response = $this->json('PUT', 'v1/customer/'.$customer->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);   
        $this->assertEquals($newLoyaltyPoints, $response['data']['card_no']);               
    }
    
     /**
     * A basic feature test can soft delete  customer using DELETE.
     *
     * @return void
     */
    public function test_can_soft_delete_customer()
    {       
        Customer::factory()->create();
        $customer = Customer::first();
        
        $response = $this->json('DELETE', 'v1/customer/'.$customer->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete customer using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_customer()
    {       
        Customer::factory()->create();
        $customer = Customer::first();
        
        $this->json('DELETE', 'v1/customer/'.$customer->id); 
        $response = $this->get( 'v1/customer-parmanently-delete/'.$customer->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }
    
}
