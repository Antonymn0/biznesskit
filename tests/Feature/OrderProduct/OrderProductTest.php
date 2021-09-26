<?php

namespace Tests\Feature\OrderProduct;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\Product;
use Tests\TestCase;

class OrderProductTest extends TestCase
{
     use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch orderProducts using GET
     *
     * @return void
     */
    public function test_can_fetch_orderProducts()
    {
        OrderProduct::factory()->create();
        $response = $this->get('v1/order-product')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create a orderProduct .
     *
     * @return void
     */
    public function test_can_create_orderProduct()
    {   
        $data = $this->orderProductData(); 
        $order = Order::factory()->create();
        $product = Product::factory()->create();
        $data['order_id'] = $order->id;
        $data['product_id'] = $product->id;
        $data['name'] = $product->name;
        $data['unit_price'] = $product->regular_price;
        $data['total_amount'] = $data['quantity'] * $data['unit_price']; 
        $data['payable_amount'] = $data['total_amount']; 
        
        $response = $this->post('v1/order-product', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single orderProduct using GET.
     *
     * @return void
     */
    public function test_can_get_a_orderProduct()
    {         
        OrderProduct::factory()->create(); 
        $orderProduct = OrderProduct::first();
        $response = $this->get('v1/order-product/'.$orderProduct->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update a orderProduct using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_orderProduct()
    {       
        
        $orderProduct = OrderProduct::factory()->create(['name' => 'test 1']);
        $newName = 'test 2';
        $updateData = $orderProduct->toArray();

        $updateData['name']=$newName;
        $response = $this->json('PUT', 'v1/order-product/'.$orderProduct->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);      
        $this->assertEquals($newName, $response['data']['name']);
                    
    }
    
     /**
     * A basic feature test can soft delete a orderProduct using DELETE.
     *
     * @return void
     */
    public function test_can_soft_delete_orderProduct()
    {       
        OrderProduct::factory()->create();
        $orderProduct = OrderProduct::first();
        
        $response = $this->json('DELETE', 'v1/order-product/'.$orderProduct->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete orderProduct using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_orderProduct()
    {       
        OrderProduct::factory()->create();
        $orderProduct = OrderProduct::first();
        
        $this->json('DELETE', 'v1/order-product/'.$orderProduct->id); 
        $response = $this->get( 'v1/order-product-parmanently-delete/'.$orderProduct->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

    private function orderProductData(){
        return [
            'payable_amount' => 100,
            'quantity' => 1,
        ];
    }
    
}
