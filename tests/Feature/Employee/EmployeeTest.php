<?php

namespace Tests\Feature\Employee;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Employee;
use App\Models\User;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
     use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch employees using GET
     *
     * @return void
     */
    public function test_can_fetch_employees()
    {
        Employee::factory()->create();
        $response = $this->get('v1/employee')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create an employee .
     *
     * @return void
     */
    public function test_can_create_employee()
    {     
        $user = User::factory()->create();
        $data = ['user_id' => $user->id];   
        //$data = @json_decode(json_encode(Employee::Factory()->create()), true); 
        $response = $this->post('v1/employee', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single employee using GET.
     *
     * @return void
     */
    public function test_can_get_a_employee()
    {         
        Employee::factory()->create(); 
        $employee = Employee::first();
        $response = $this->get('v1/employee/'.$employee->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update an employee using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_employee()
    {       
        
        $employee = Employee::factory()->create(['work_email' => 'email1@example.com']);

        $newEmail = 'email2@example.com';
        $updateData = $employee->toArray();
        $updateData['work_email'] = $newEmail;
        $response = $this->json('PUT', 'v1/employee/'.$employee->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);    

        $this->assertEquals($newEmail, $response['data']['work_email']);               
                      
    }
    
     /**
     * A basic feature test can soft delete a employee using DELETE.
     *
     * @return void
     */
    public function test_can_soft_delete_employee()
    {       
        Employee::factory()->create();
        $employee = Employee::first();
        
        $response = $this->json('DELETE', 'v1/employee/'.$employee->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete employee using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_employee()
    {       
        Employee::factory()->create();
        $employee = Employee::first();
        
        $this->json('DELETE', 'v1/employee/'.$employee->id); 
        $response = $this->get( 'v1/employee-parmanently-delete/'.$employee->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }
    
}
