<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Events\customerCreated;
use App\Events\customerUpdated;
use App\Events\customerDestroyed;
use App\Http\Requests\Customer\ValidateCustomer;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of customers',
            'data'=>$customer], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateCostomer  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateCUstomer $request)
    {
        $data = $request->validated();
        $customer = Customer::create($data);
        event(new customerCreated($customer));
        return response()->json([
            'success'=> true,
            'message'=> 'Customer created successfuly',
            'data'=>$customer],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single customer retrieved successfuly',
            'data'=>$customer], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateCostomer  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateCustomer $request, $id)
    {
        $data = $request->validated();
        $customer = Customer::findOrFail($id);
        $customer->update($data);
        event(new customerUpdated($customer));
        return response()->json([
            'success'=> true, 
            'message'=>'Customer updated successfuly',
            'data'=>$customer], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        event(new customerDestroyed($customer));
        return response()->json([
            'success'=> true,
            'message'=> 'Customer deleted successfuly',
            'data'=>$customer], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->forceDelete();
        event(new customerDestroyed($customer)); 
        return response()->json([
            'success' => true,
            'message' => 'Customer deleted parmanently!',
            'data' => $customer
        ], 200);
    }
}
