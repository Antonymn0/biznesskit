<?php

namespace Tests\Feature\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch products using GET
     *
     * @return void
     */
    public function test_can_fetch_products()
    {
        Product::factory()->create();
        $response = $this->get('v1/product')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create a product .
     *
     * @return void
     */
    public function test_can_create_a_product()
    {   
        $data = $this->productData();
        //$data = @json_decode(json_encode(Product::Factory()->create()), true); 
        $response = $this->post('v1/product', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single product using GET.
     *
     * @return void
     */
    public function test_can_get_a_product()
    {         
        @json_decode(json_encode(Product::Factory()->create()), true);
        $product = Product::first();
        $response = $this->get('v1/product/'.$product->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update a product using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_product()
    {       
        $product = Product::factory()->create(['name'=>'product 1']);
        $newName = 'product 2';
        
        $updateData= $product->toArray();
        $updateData['name'] = $newName;

        $response = $this->json('PUT', 'v1/product/'.$product->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);   
        $this->assertEquals($newName, $response['data']['name']);                 
    }
    
     /**
     * A basic feature test can soft delete a product using DELETE.
     *
     * @return void
     */
    public function test_can_soft_delete_product()
    {       
        Product::factory()->create();
        $product = Product::first();
        
        $response = $this->json('DELETE', 'v1/product/'.$product->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete product using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_product()
    {       
        Product::factory()->create();
        $product = Product::first();
        
        $this->json('DELETE', 'v1/product/'.$product->id); 
        $response = $this->get( 'v1/product-parmanently-delete/'.$product->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

    private function productData(){
        return [
        'name' => 'product 1',
        'regular_price' => 500,
        ];
    }
    

}
