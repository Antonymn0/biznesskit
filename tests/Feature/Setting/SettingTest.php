<?php

namespace Tests\Feature\Setting;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Setting;
use Tests\TestCase;

class SettingTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch settings using GET
     *
     * @return void
     */
    public function test_can_fetch_settings()
    {
        Setting::factory()->create();
        $response = $this->get('v1/setting')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create a setting .
     *
     * @return void
     */
    public function test_can_create_a_setting()
    {        
        $data = @json_decode(json_encode(Setting::Factory()->create()), true); 
        $response = $this->post('v1/setting', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single setting using GET.
     *
     * @return void
     */
    public function test_can_get_a_setting()
    {         
        Setting::factory()->create(); 
        $setting = Setting::first();
        $response = $this->get('v1/setting/'.$setting->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update a setting using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_setting()
    {       
        Setting::factory()->create();
        $setting = Setting::first();

        $updateData= @json_decode(json_encode(Setting::Factory()->create()), true);
        $response = $this->json('PUT', 'v1/setting/'.$setting->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);                  
    }
    
     /**
     * A basic feature test can soft delete a setting using DELETE.
     *
     * @return void
     */
    public function test_can_softdelete_setting()
    {       
        Setting::factory()->create();
        $setting = Setting::first();
        
        $response = $this->json('DELETE', 'v1/setting/'.$setting->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete setting using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_setting()
    {       
        Setting::factory()->create();
        $setting = Setting::first();
        
        $this->json('DELETE', 'v1/setting/'.$setting->id); 
        $response = $this->get( 'v1/setting-parmanently-delete/'.$setting->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }
    

}
