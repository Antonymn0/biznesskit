<?php

namespace App\Http\Controllers\Api\Subscriber;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Events\subscriberCreated;
use App\Events\subscriberUpdated;
use App\Events\subscriberDestroyed;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subscriber\UpdateSubscriber;
use App\Http\Requests\Subscriber\ValidateSubscriber;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriber = Subscriber::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of subscribers',
            'data'=>$subscriber], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateSubscriber  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateSubscriber $request)
    {
        $data = $request->validated();
        $subscriber= Subscriber::create($data);
        event(new subscriberCreated($subscriber));
        return response()->json([
            'success'=> true,
            'message'=> 'Subscriber created successfuly',
            'data'=>$subscriber],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single subscriber retrieved successfuly',
            'data'=>$subscriber], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\UpdateSubscriber  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriber $request, $id)
    {
        $data = $request->validated();
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->update($data);
        event(new subscriberUpdated($subscriber));
        return response()->json([
            'success'=> true, 
            'message'=>'Subscriber updated successfuly',
            'data'=>$subscriber], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();
        event(new subscriberDestroyed($subscriber));
        return response()->json([
            'success'=> true,
            'message'=> 'Subscriber deleted successfuly',
            'data'=>$subscriber], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $subscriber = Subscriber::onlyTrashed()->findOrFail($id);
        $subscriber->forceDelete();
        event(new subscriberDestroyed($subscriber)); 
        return response()->json([
            'success' => true,
            'message' => 'Subscriber parmanently deleted !',
            'data' => $subscriber
        ], 200);
    }
    
}
