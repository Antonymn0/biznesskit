<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Events\categoryCreated;
use App\Events\categoryUpdated;
use App\Events\categoryDestroyed;
use App\Http\Requests\Category\ValidateCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of categorys',
            'data'=>$category], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateCategory $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name'], '-');
        $category = Category::create($data);
        event(new categoryCreated($category));
        return response()->json([
            'success'=> true,
            'message'=> 'Category created successfuly',
            'data'=>$category],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single category retrieved successfuly',
            'data'=>$category], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateCategory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateCategory $request, $id)
    {
        $data = $request->validated();
        $category = Category::findOrFail($id);
        $data['slug'] = Str::slug($data['name'], '-');
        $category->update($data);
        event(new categoryUpdated($category));
        return response()->json([
            'success'=> true, 
            'message'=>'Category updated successfuly',
            'data'=>$category], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        event(new categoryDestroyed($category));
        return response()->json([
            'success'=> true,
            'message'=> 'Category deleted successfuly',
            'data'=>$category], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        event(new categoryDestroyed($category)); 
        return response()->json([
            'success' => true,
            'message' => 'Category deleted parmanently!',
            'data' => $category
        ], 200);
    }
}
