<?php

namespace Tests\Feature\Inventory;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Inventory;
use Tests\TestCase;

class InventoryTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch inventory using GET
     *
     * @return void
     */
    public function test_can_fetch_inventory()
    {
        Inventory::factory()->create();
        $response = $this->get('v1/inventory')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create an inventory .
     *
     * @return void
     */
    public function test_can_create_inventory()
    {    
        $data = $this->inventoryData();   
        //$data = @json_decode(json_encode(Inventory::Factory()->create()), true); 
        $response = $this->post('v1/inventory', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single inventory using GET.
     *
     * @return void
     */
    public function test_can_get_a_inventory()
    {         
        Inventory::factory()->create(); 
        $inventory = inventory::first();
        $response = $this->get('v1/inventory/'.$inventory->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update an inventory using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_inventory()
    {    
        $inventory = Inventory::factory()->create(['new_quantity'=>500]);
        $newQty = 400;

        $updateData= $inventory->toArray();
        $updateData['new_quantity'] = $newQty;

        $response = $this->json('PUT', 'v1/inventory/'.$inventory->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);         
        $this->assertEquals($newQty, $response['data']['new_quantity']);  
    }
    
     /**
     * A basic feature test can soft delete a inventory using DELETE.
     *
     * @return void
     */
    public function test_can_soft_delete_inventory()
    {       
        Inventory::factory()->create();
        $inventory = Inventory::first();
        
        $response = $this->json('DELETE', 'v1/inventory/'.$inventory->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete inventory using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_inventory()
    {       
        Inventory::factory()->create();
        $inventory = Inventory::first();
        
        $this->json('DELETE', 'v1/inventory/'.$inventory->id); 
        $response = $this->get( 'v1/inventory-parmanently-delete/'.$inventory->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

    private function inventoryData(){
        return [
            'product_id' => 1,
            'created_by' => 1,
            'new_quantity' => 100,
            'available_quantity' => 100,
            'units' => 'liters',
        ];
    }
    
}
