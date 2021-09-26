<?php

namespace App\Http\Controllers\Api\Shift;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shift;
use App\Events\shiftCreated;
use App\Events\shiftUpdated;
use App\Events\shiftDestroyed;
use App\Http\Requests\Shift\ValidateShift;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shift = Shift::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of shifts',
            'data'=>$shift], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\validateShift  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateShift $request)
    {
        $data = $request->validated();
        $shift= Shift::create($data);
        event(new shiftCreated($shift));
        return response()->json([
            'success'=> true,
            'message'=> 'Shift created successfuly',
            'data'=>$shift],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shift = Shift::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single shift retrieved successfuly',
            'data'=>$shift], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateShift  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateShift $request, $id)
    {
        $data = $request->validated();
        $shift = Shift::findOrFail($id);
        $shift->update($data);
        event(new shiftUpdated($shift));
        return response()->json([
            'success'=> true, 
            'message'=>'Shift updated successfuly',
            'data'=>$shift], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();
        event(new shiftDestroyed($shift));
        return response()->json([
            'success'=> true,
            'message'=> 'Shift deleted successfuly',
            'data'=>$shift], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $shift = Shift::onlyTrashed()->findOrFail($id);
        $shift->forceDelete();
        event(new shiftDestroyed($shift)); 
        return response()->json([
            'success' => true,
            'message' => 'Shift parmanently deleted !',
            'data' => $shift
        ], 200);
    }
    
}
