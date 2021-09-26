<?php

namespace Tests\Feature\Wallet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use App\Models\Wallet;
use Tests\TestCase;

class WalletTest extends TestCase
{
   use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch wallets using GET
     *
     * @return void
     */
    public function test_can_fetch_wallets()
    {
        Wallet::factory()->create();
        $response = $this->get('v1/account')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create a wallet .
     *
     * @return void
     */
    public function test_can_create_wallet()
    {        
        $data = @json_decode(Wallet::Factory()->create(), true);
        $response = $this->post('v1/account', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single wallet using GET.
     *
     * @return void
     */
    public function test_can_get_a_wallet()
    {         
        Wallet::factory()->create(); 
        $wallet = Wallet::first();
        $response = $this->get('v1/account/'.$wallet->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update a wallet using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_wallet()
    {       
        Wallet::factory()->create();
        $wallet = Wallet::first();

        $updateData= @json_decode(json_encode(Wallet::Factory()->create()), true);
        $response = $this->json('PUT', 'v1/account/'.$wallet->id, $updateData); 
        $response->assertStatus(200)
                ->assertJson([
                'success' => true,
                ]);                  
    }
    
     /**
     * A basic feature test can soft delete a wallet using DELETE.
     *
     * @return void
     */
    public function test_can_softdelete_wallet()
    {       
        Wallet::factory()->create();
        $wallet = Wallet::first();
        
        $response = $this->json('DELETE', 'v1/account/'.$wallet->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete wallet using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_wallet()
    {       
        Wallet::factory()->create();
        $wallet = Wallet::first();
        
        $this->json('DELETE', 'v1/account/'.$wallet->id); 
        $response = $this->get( 'v1/account-parmanently-delete/'.$wallet->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }
    
}
