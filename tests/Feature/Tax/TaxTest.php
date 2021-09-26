<?php

namespace Tests\Feature\Tax;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use App\Models\Tax;
use Tests\TestCase;

class TaxTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch taxs using GET
     *
     * @return void
     */
    public function test_can_fetch_taxs()
    {
        Tax::factory()->create();
        $response = $this->get('v1/tax')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create a tax .
     *
     * @return void
     */
    public function test_can_create_a_tax()
    {        
        $data = @json_decode(Tax::Factory()->create(), true);
        $response = $this->post('v1/tax', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single tax using GET.
     *
     * @return void
     */
    public function test_can_get_a_tax()
    {         
        Tax::factory()->create(); 
        $tax = Tax::first();
        $response = $this->get('v1/tax/'.$tax->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update a tax using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_tax()
    {       
        Tax::factory()->create();
        $tax = Tax::first();

        $updateData= @json_decode(json_encode(Tax::Factory()->create()), true);
        $response = $this->json('PUT', 'v1/tax/'.$tax->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);                  
    }
    
     /**
     * A basic feature test can soft delete a tax using DELETE.
     *
     * @return void
     */
    public function test_can_softdelete_a_tax()
    {       
        Tax::factory()->create();
        $tax = Tax::first();
        
        $response = $this->json('DELETE', 'v1/tax/'.$tax->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete tax using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_tax()
    {       
        Tax::factory()->create();
        $tax = Tax::first();
        
        $this->json('DELETE', 'v1/tax/'.$tax->id); 
        $response = $this->get( 'v1/tax-parmanently-delete/'.$tax->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }
    

}
