<?php

namespace Tests\Feature\Payment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Payment;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch payments using GET
     *
     * @return void
     */
    public function test_can_fetch_payments()
    {
        Payment::factory()->create();
        $response = $this->get('v1/payment')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create a payment .
     *
     * @return void
     */
    public function test_can_create_a_payment()
    {        
        $data = $this->paymentData();//@json_decode(json_encode(Payment::Factory()->create()), true); 
        $response = $this->post('v1/payment', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single payment using GET.
     *
     * @return void
     */
    public function test_can_get_a_payment()
    {         
        Payment::factory()->create(); 
        $payment = Payment::first();
        $response = $this->get('v1/payment/'.$payment->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update a payment using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_payment()
    {       
        
        $payment = Payment::factory()->create(['status' => 'intiated']);
        $newStatus = 'completed';
        $updateData= $payment->toArray();
        $updateData['status'] = $newStatus;
        $response = $this->json('PUT', 'v1/payment/'.$payment->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);  
        $this->assertEquals($newStatus, $response['data']['status']);                
    }
    
     /**
     * A basic feature test can soft delete a payment using DELETE.
     *
     * @return void
     */
    public function test_can_soft_delete_a_payment()
    {       
        Payment::factory()->create();
        $payment = Payment::first();
        
        $response = $this->json('DELETE', 'v1/payment/'.$payment->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete payment using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_payment()
    {       
        Payment::factory()->create();
        $payment = Payment::first();
        
        $this->json('DELETE', 'v1/payment/'.$payment->id); 
        $response = $this->get( 'v1/payment-parmanently-delete/'.$payment->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

    private function paymentData(){
        return [
            'order_id' => 1,
            'method' => 'mpesa',
            'status' => 'intiated',
            'currency' => 'KES',
            'total_due' => 5000,
        ];
    }
    
}
