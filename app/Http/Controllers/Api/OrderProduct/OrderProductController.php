<?php

namespace App\Http\Controllers\Api\OrderProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Events\orderProductCreated;
use App\Events\orderProductUpdated;
use App\Events\orderProductDestroyed;
use App\Http\Requests\OrderProduct\ValidateOrderProduct;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderproduct = Orderproduct::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of orderproducts',
            'data'=>$orderproduct], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateOrderProduct  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateOrderProduct $request)
    {
        $data = $request->validated();
        $orderproduct = Orderproduct::create($data);
        event(new orderproductCreated($orderproduct));
        return response()->json([
            'success'=> true,
            'message'=> 'Orderproduct created successfuly',
            'data'=>$orderproduct],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderProduct = OrderProduct::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single orderProduct retrieved successfuly',
            'data'=>$orderProduct], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateOrderProduct  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateOrderProduct $request, $id)
    {
        $data = $request->validated();
        $orderProduct = OrderProduct::findOrFail($id);
        $orderProduct->update($data);
        event(new orderProductUpdated($orderProduct));
        return response()->json([
            'success'=> true, 
            'message'=>'OrderProduct updated successfuly',
            'data'=>$orderProduct], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderProduct = OrderProduct::findOrFail($id);
        $orderProduct->delete();
        event(new orderProductDestroyed($orderProduct));
        return response()->json([
            'success'=> true,
            'message'=> 'OrderProduct deleted successfuly',
            'data'=>$orderProduct], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $orderProduct = OrderProduct::onlyTrashed()->findOrFail($id);
        $orderProduct->forceDelete();
        event(new orderProductDestroyed($orderProduct)); 
        return response()->json([
            'success' => true,
            'message' => 'OrderProduct deleted parmanently!',
            'data' => $orderProduct
        ], 200);
    }
    
}
