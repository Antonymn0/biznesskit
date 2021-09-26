<?php

namespace App\Http\Controllers\Api\Tax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tax;
use App\Events\taxCreated;
use App\Events\taxUpdated;
use App\Events\taxDestroyed;
use App\Http\Requests\Tax\ValidateTax;


class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tax = Tax::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of taxes',
            'data'=>$tax], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\Tax\ValidateTax  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateTax $request)
    {
        $data = $request->validated();
        $tax= Tax::create($data);
        event(new taxCreated($tax));
        return response()->json([
            'success'=> true,
            'message'=> 'Tax created successfuly',
            'data'=>$tax],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tax = Tax::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single tax retrieved successfuly',
            'data'=>$tax], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\Tax\ValidateTax  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateTax $request, $id)
    {
        $data = $request->validated();
        $tax = Tax::findOrFail($id);
        $tax->update($data);
        event(new taxUpdated($tax));
        return response()->json([
            'success'=> true, 
            'message'=>'Tax updated successfuly',
            'data'=>$tax], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tax = Tax::findOrFail($id);
        $tax->delete();
        event(new taxDestroyed($tax));
        return response()->json([
            'success'=> true,
            'message'=> 'Tax deleted successfuly',
            'data'=>$tax], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $tax = Tax::onlyTrashed()->findOrFail($id);
        $tax->forceDelete();
        event(new taxDestroyed($tax)); 
        return response()->json([
            'success' => true,
            'message' => 'Tax parmanently deleted !',
            'data' => $tax
        ], 200);
    }
    
}
