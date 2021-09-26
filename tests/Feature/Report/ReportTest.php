<?php

namespace Tests\Feature\Report;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Report;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch reports using GET
     *
     * @return void
     */
    public function test_can_fetch_reports()
    {
        Report::factory()->create();
        $response = $this->get('v1/report')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create a report .
     *
     * @return void
     */
    public function test_can_create_a_report()
    {        
        $data = @json_decode(json_encode(Report::Factory()->create()), true); 
        $response = $this->post('v1/report', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single report using GET.
     *
     * @return void
     */
    public function test_can_get_a_report()
    {         
        Report::factory()->create(); 
        $report = Report::first();
        $response = $this->get('v1/report/'.$report->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update a report using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_report()
    {       
        Report::factory()->create();
        $report = Report::first();

        $updateData= @json_decode(json_encode(Report::Factory()->create()), true);
        $response = $this->json('PUT', 'v1/report/'.$report->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);                  
    }
    
     /**
     * A basic feature test can soft delete a report using DELETE.
     *
     * @return void
     */
    public function test_can_soft_delete_report()
    {       
        Report::factory()->create();
        $report = Report::first();
        
        $response = $this->json('DELETE', 'v1/report/'.$report->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete report using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_report()
    {       
        Report::factory()->create();
        $report = Report::first();
        
        $this->json('DELETE', 'v1/report/'.$report->id); 
        $response = $this->get( 'v1/report-parmanently-delete/'.$report->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }
    

}
