<?php

namespace Tests\Feature\Shift;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Shift;
use Tests\TestCase;

class ShiftTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch shifts using GET
     *
     * @return void
     */
    public function test_can_fetch_shifts()
    {
        Shift::factory()->create();
        $response = $this->get('v1/shift')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create a shift .
     *
     * @return void
     */
    public function test_can_create_a_shift()
    {        
        $data = @json_decode(json_encode(Shift::Factory()->create()), true); 
        $response = $this->post('v1/shift', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single shift using GET.
     *
     * @return void
     */
    public function test_can_get_a_shift()
    {         
        Shift::factory()->create(); 
        $shift = Shift::first();
        $response = $this->get('v1/shift/'.$shift->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update a shift using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_shift()
    {       
        Shift::factory()->create();
        $shift = Shift::first();

        $updateData= @json_decode(json_encode(shift::Factory()->create()), true);
        $response = $this->json('PUT', 'v1/shift/'.$shift->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);                  
    }
    
     /**
     * A basic feature test can soft delete a shift using DELETE.
     *
     * @return void
     */
    public function test_can_softdelete_shift()
    {       
        Shift::factory()->create();
        $shift = Shift::first();
        
        $response = $this->json('DELETE', 'v1/shift/'.$shift->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete shift using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_shift()
    {       
        Shift::factory()->create();
        $shift = Shift::first();
        
        $this->json('DELETE', 'v1/shift/'.$shift->id); 
        $response = $this->get( 'v1/shift-parmanently-delete/'.$shift->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }
    

}
