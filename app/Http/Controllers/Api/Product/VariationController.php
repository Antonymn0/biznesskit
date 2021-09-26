<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Variation;
use App\Events\variationCreated;
use App\Events\variationUpdated;
use App\Events\variationDestroyed;
use App\Http\Requests\Variation\ValidateVariation;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variation = Variation::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of variations',
            'data'=>$variation], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\Variation\ValidateVariation  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateVariation $request)
    {
        $data = $request->validated();
        $variation = Variation::create($data);
        event(new variationCreated($variation));
        return response()->json([
            'success'=> true,
            'message'=> 'variation created successfuly',
            'data'=>$variation],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $variation = Variation::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single variation retrieved successfuly',
            'data'=>$variation], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\Variation\ValidateVariation  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateVariation $request, $id)
    {
        $data = $request->validated();
        $variation = Variation::findOrFail($id);
        $variation->update($data);
        event(new variationUpdated($variation));
        return response()->json([
            'success'=> true, 
            'message'=>'Variation updated successfuly',
            'data'=>$variation], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variation = Variation::findOrFail($id);
        $variation->delete();
        event(new variationDestroyed($variation));
        return response()->json([
            'success'=> true,
            'message'=> 'Variation deleted successfuly',
            'data'=>$variation], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $variation = Variation::onlyTrashed()->findOrFail($id);
        $variation->forceDelete();
        event(new variationDestroyed($variation)); 
        return response()->json([
            'success' => true,
            'message' => 'Variation parmanently deleted !',
            'data' => $variation
        ], 200);
    }
    
}
