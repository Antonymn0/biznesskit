<?php

namespace Tests\Feature\Subscription;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use App\Models\Subscription;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch subscriptions using GET
     *
     * @return void
     */
    public function test_can_fetch_subscriptions()
    {
        Subscription::factory()->create();
        $response = $this->get('v1/subscription')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create a subscription .
     *
     * @return void
     */
    public function test_can_create_a_subscription()
    {        
        $data = @json_decode(Subscription::Factory()->create(), true);
        $response = $this->post('v1/subscription', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a subscription using GET.
     *
     * @return void
     */
    public function test_can_get_a_subscription()
    {         
        Subscription::factory()->create(); 
        $subscription = Subscription::first();
        $response = $this->get('v1/subscription/'.$subscription->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update a subscription using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_subscription()
    {       
        Subscription::factory()->create();
        $subscription = Subscription::first();

        $updateData= @json_decode(json_encode(Subscription::Factory()->create()), true);
        $response = $this->json('PUT', 'v1/subscription/'.$subscription->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);                  
    }
    
     /**
     * A basic feature test can soft delete a subscription using DELETE.
     *
     * @return void
     */
    public function test_can_softdelete_a_subscription()
    {       
        Subscription::factory()->create();
        $subscription = Subscription::first();
        
        $response = $this->json('DELETE', 'v1/subscription/'.$subscription->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete subscription using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_subscription()
    {       
        Subscription::factory()->create();
        $subscription = Subscription::first();
        
        $this->json('DELETE', 'v1/subscription/'.$subscription->id); 
        $response = $this->get( 'v1/subscription-parmanently-delete/'.$subscription->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }
    

}
