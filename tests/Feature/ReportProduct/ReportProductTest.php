<?php

namespace Tests\Feature\ReportProduct;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\ReportProduct;
use Tests\TestCase;

class ReportProductTest extends TestCase
{
     use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch reportProducts using GET
     *
     * @return void
     */
    public function test_can_fetch_reportProducts()
    {
        ReportProduct::factory()->create();
        $response = $this->get('v1/report-product')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create  reportProduct .
     *
     * @return void
     */
    public function test_can_create_a_reportProduct()
    {        
        $data = @json_decode(json_encode(ReportProduct::Factory()->create()), true); 
        $response = $this->post('v1/report-product', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single reportProduct using GET.
     *
     * @return void
     */
    public function test_can_get_a_reportProduct()
    {         
        ReportProduct::factory()->create(); 
        $reportProduct = ReportProduct::first();
        $response = $this->get('v1/report-product/'.$reportProduct->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update reportProduct using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_reportProduct()
    {       
        ReportProduct::factory()->create();
        $reportProduct = ReportProduct::first();

        $updateData= @json_decode(json_encode(ReportProduct::Factory()->create()), true);
        $response = $this->json('PUT', 'v1/report-product/'.$reportProduct->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);                  
    }
    
     /**
     * A basic feature test can soft delete a reportProduct using DELETE.
     *
     * @return void
     */
    public function test_can_soft_delete_reportProduct()
    {       
        ReportProduct::factory()->create();
        $reportProduct = ReportProduct::first();
        
        $response = $this->json('DELETE', 'v1/report-product/'.$reportProduct->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete reportProduct using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_reportProduct()
    {       
        ReportProduct::factory()->create();
        $reportProduct = ReportProduct::first();
        
        $this->json('DELETE', 'v1/report-product/'.$reportProduct->id); 
        $response = $this->get( 'v1/report-product-parmanently-delete/'.$reportProduct->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }
    
}
