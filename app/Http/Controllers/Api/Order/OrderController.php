<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Events\orderCreated;
use App\Events\orderUpdated;
use App\Events\orderDestroyed;
use App\Http\Requests\Order\ValidateOrder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of orders',
            'data'=>$order], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateOrder $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateOrder $request)
    {
        $data = $request->validated();
        $order = Order::create($data);
        event(new orderCreated($order));
        return response()->json([
            'success'=> true,
            'message'=> 'Order created successfuly',
            'data'=>$order],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single order retrieved successfuly',
            'data'=>$order], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateOrder  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateOrder $request, $id)
    {
        $data = $request->validated();
        $order = Order::findOrFail($id);
        $order->update($data);
        event(new orderUpdated($order));
        return response()->json([
            'success'=> true, 
            'message'=>'Order updated successfuly',
            'data'=>$order], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        event(new orderDestroyed($order));
        return response()->json([
            'success'=> true,
            'message'=> 'Order deleted successfuly',
            'data'=>$order], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $order->forceDelete();
        event(new orderDestroyed($order)); 
        return response()->json([
            'success' => true,
            'message' => 'Order deleted parmanently!',
            'data' => $order
        ], 200);
    }
    
}
