<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Events\productCreated;
use App\Events\productUpdated;
use App\Events\productDestroyed;
use Illuminate\Support\Str;
use App\Http\Requests\Product\ValidateProduct;
use App\Http\Requests\Product\UpdateProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of products',
            'data'=>$product], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateProduct  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateProduct $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name'], '-');

        $product = Product::create($data);
        event(new productCreated($product));
        return response()->json([
            'success'=> true,
            'message'=> 'Product created successfuly',
            'data'=>$product],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single product retrieved successfuly',
            'data'=>$product], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\UpdateProduct  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {
        $data = $request->validated();
        $product = Product::findOrFail($id);
        $product->update($data);
        event(new productUpdated($product));
        return response()->json([
            'success'=> true, 
            'message'=>'Product updated successfuly',
            'data'=>$product], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        event(new productDestroyed($product));
        return response()->json([
            'success'=> true,
            'message'=> 'Product deleted successfuly',
            'data'=>$product], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();
        event(new productDestroyed($product)); 
        return response()->json([
            'success' => true,
            'message' => 'Product parmanently deleted !',
            'data' => $product
        ], 200);
    }
    
}
