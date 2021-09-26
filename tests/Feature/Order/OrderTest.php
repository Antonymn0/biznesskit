<?php

namespace Tests\Feature\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Order;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch orders using GET
     *
     * @return void
     */
    public function test_can_fetch_orders()
    {
        Order::factory()->create();
        $response = $this->get('v1/order')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create an order .
     *
     * @return void
     */
    public function test_can_create_order()
    {   
        $data = $this->orderData();
        //$data = @json_decode(json_encode(Order::Factory()->create()), true); 
        $response = $this->post('v1/order', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single order using GET.
     *
     * @return void
     */
    public function test_can_get_a_order()
    {         
        Order::factory()->create(); 
        $order = Order::first();
        $response = $this->get('v1/order/'.$order->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update an order using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_order()
    {       
        $order = Order::factory()->create(['status' => 'processing']);
        $newStatus = 'shipped';

        $updateData= $order->toArray();
        $updateData['status'] = $newStatus;

        $response = $this->json('PUT', 'v1/order/'.$order->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);      
        $this->assertEquals($newStatus, $response['data']['status']);            
    }
    
     /**
     * A basic feature test can soft delete a order using DELETE.
     *
     * @return void
     */
    public function test_can_soft_delete_a_order()
    {       
        Order::factory()->create();
        $order = Order::first();
        
        $response = $this->json('DELETE', 'v1/order/'.$order->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete order using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_order()
    {       
        Order::factory()->create();
        $order = Order::first();
        
        $this->json('DELETE', 'v1/order/'.$order->id); 
        $response = $this->get( 'v1/order-parmanently-delete/'.$order->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

    private function orderData(){
        return [
            'customer_id' => 1,
            'cashier_id' => 1,
            'status' => 'processing',
            'amount_due' => 5000,
        ];
    }
    
}
