<?php

namespace App\Http\Controllers\Api\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Events\subscriptionCreated;
use App\Events\subscriptionUpdated;
use App\Events\subscriptionDestroyed;
use App\Http\Requests\Subscription\ValidateSubscription;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscription = Subscription::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of subscriptions',
            'data'=>$subscription], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Http\Request\Subscription\ValidateSubscription  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateSubscription $request)
    {
        $data = $request->validated();
        $subscription = Subscription::create($data);
        event(new subscriptionCreated($subscription));
        return response()->json([
            'success'=> true,
            'message'=> 'Subscription created successfuly',
            'data'=>$subscription],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single subscription retrieved successfuly',
            'data'=>$subscription], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request/Subscription\ValidateSubscription  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateSubscription $request, $id)
    {
        $data = $request->validated();
        $subscription = Subscription::findOrFail($id);
        $subscription->update($data);
        event(new subscriptionUpdated($subscription));
        return response()->json([
            'success'=> true, 
            'message'=>'Subscription updated successfuly',
            'data'=>$subscription], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        event(new subscriptionDestroyed($subscription));
        return response()->json([
            'success'=> true,
            'message'=> 'Subscription deleted successfuly',
            'data'=>$subscription], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $subscription = Subscription::onlyTrashed()->findOrFail($id);
        $subscription->forceDelete();
        event(new subscriptionDestroyed($subscription)); 
        return response()->json([
            'success' => true,
            'message' => 'Subscription parmanently deleted !',
            'data' => $subscription
        ], 200);
    }
    

}
