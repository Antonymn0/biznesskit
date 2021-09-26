<?php

namespace Tests\Feature\Variation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use App\Models\Variation;
use Tests\TestCase;

class VariationTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch variations using GET
     *
     * @return void
     */
    public function test_can_fetch_variations()
    {
        Variation::factory()->create();
        $response = $this->get('v1/variation')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create a variation .
     *
     * @return void
     */
    public function test_can_create_a_variation()
    {        
        $data = @json_decode(Variation::Factory()->create(), true);
        $response = $this->post('v1/variation', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single variation using GET.
     *
     * @return void
     */
    public function test_can_get_a_variation()
    {         
        Variation::factory()->create(); 
        $variation = Variation::first();
        $response = $this->get('v1/variation/'.$variation->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update a variation using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_variation()
    {       
        Variation::factory()->create();
        $variation = Variation::first();

        $updateData= @json_decode(json_encode(Variation::Factory()->create()), true);
        $response = $this->json('PUT', 'v1/variation/'.$variation->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);                  
    }
    
     /**
     * A basic feature test can soft delete a variation using DELETE.
     *
     * @return void
     */
    public function test_can_softdelete_a_variation()
    {       
        Variation::factory()->create();
        $variation = Variation::first();
        
        $response = $this->json('DELETE', 'v1/variation/'.$variation->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete variation using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_variation()
    {       
        Variation::factory()->create();
        $variation = Variation::first();
        
        $this->json('DELETE', 'v1/variation/'.$variation->id); 
        $response = $this->get( 'v1/variation-parmanently-delete/'.$variation->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }
    
}
