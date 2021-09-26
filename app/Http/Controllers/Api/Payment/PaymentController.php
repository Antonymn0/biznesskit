<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Events\paymentCreated;
use App\Events\paymentUpdated;
use App\Events\paymentDestroyed;
use App\Http\Requests\Payment\ValidatePayment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of payments',
            'data'=>$payment], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidatePayment  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePayment $request)
    {
        $data = $request->validated();
        $payment = Payment::create($data);
        event(new paymentCreated($payment));
        return response()->json([
            'success'=> true,
            'message'=> 'Payment created successfuly',
            'data'=>$payment],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single payment retrieved successfuly',
            'data'=>$payment], 200);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidatePayment  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePayment $request, $id)
    {
        $data = $request->validated();
        $payment = Payment::findOrFail($id);
        $payment->update($data);
        event(new paymentUpdated($payment));
        return response()->json([
            'success'=> true, 
            'message'=>'Payment updated successfuly',
            'data'=>$payment], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        event(new paymentDestroyed($payment));
        return response()->json([
            'success'=> true,
            'message'=> 'Payment deleted successfuly',
            'data'=>$payment], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $payment = Payment::onlyTrashed()->findOrFail($id);
        $payment->forceDelete();
        event(new paymentDestroyed($payment)); 
        return response()->json([
            'success' => true,
            'message' => 'Payment deleted parmanently!',
            'data' => $payment
        ], 200);
    }
    
}
