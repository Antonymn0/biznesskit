<?php

namespace Tests\Feature\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
   use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test can fetch categorys using GET
     *
     * @return void
     */
    public function test_can_fetch_categorys()
    {
        Category::factory()->create();
        $response = $this->get('v1/category')
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can create an category .
     *
     * @return void
     */
    public function test_can_create_category()
    {        
        $data = $this->catData();
        $response = $this->post('v1/category', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);
    }

    /**
     * A basic feature test can get a single category using GET.
     *
     * @return void
     */
    public function test_can_get_a_category()
    {         
        Category::factory()->create(); 
        $category = Category::first();
        $response = $this->get('v1/category/'.$category->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                   
    }

    /**
     * A basic feature test can update an category using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_category()
    {       
        $category = Category::factory()->create(['name'=>'category 1']);

        //$updateData= @json_decode(json_encode(Category::Factory()->create()), true);
        $newName = 'category 2';
        $updateData = ['name' => $newName];
        $response = $this->json('PUT', 'v1/category/'.$category->id, $updateData); 
        $response->assertStatus(200)
                    ->assertJson([
                    'success' => true,
                    ]);   
        $this->assertEquals($newName, $response['data']['name']);               
    }
    
     /**
     * A basic feature test can delete a category using DELETE.
     *
     * @return void
     */
    public function test_can_soft_delete_category()
    {       
        Category::factory()->create();
        $category = Category::first();
        
        $response = $this->json('DELETE', 'v1/category/'.$category->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

     /**
     * A basic feature test can parmanently delete category using DELETE.
     *
     * @return void
     */
    public function test_can_parmanently_delete_category()
    {       
        Category::factory()->create();
        $category = Category::first();
        
        $this->json('DELETE', 'v1/category/'.$category->id); 
        $response = $this->get( 'v1/category-parmanently-delete/'.$category->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

    private function catData(){
        return [
            'name' => 'category example',
        ];
    }
    
}
