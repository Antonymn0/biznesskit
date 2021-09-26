<?php

namespace App\Http\Controllers\Api\ReportProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportProduct;
use App\Events\reportProductCreated;
use App\Events\reportProductUpdated;
use App\Events\reportProductDestroyed;
use App\Http\Requests\ReportProduct\ValidateReportProduct;

class ReportProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportProduct = ReportProduct::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of reportProducts',
            'data'=>$reportProduct], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\validateReportProduct  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateReportProduct $request)
    {
        $data = $request->validated();
        $reportproduct = Reportproduct::create($data);
        event(new reportproductCreated($reportproduct));
        return response()->json([
            'success'=> true,
            'message'=> 'Reportproduct created successfuly',
            'data'=>$reportproduct],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reportProduct = ReportProduct::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single reportProduct retrieved successfuly',
            'data'=>$reportProduct], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateReportProduct  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateReportProduct $request, $id)
    {
        $data = $request->validated();
        $reportProduct = ReportProduct::findOrFail($id);
        $reportProduct->update($data);
        event(new reportProductUpdated($reportProduct));
        return response()->json([
            'success'=> true, 
            'message'=>'ReportProduct updated successfuly',
            'data'=>$reportProduct], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reportProduct = ReportProduct::findOrFail($id);
        $reportProduct->delete();
        event(new reportProductDestroyed($reportProduct));
        return response()->json([
            'success'=> true,
            'message'=> 'ReportProduct deleted successfuly',
            'data'=>$reportProduct], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $reportProduct = ReportProduct::onlyTrashed()->findOrFail($id);
        $reportProduct->forceDelete();
        event(new reportProductDestroyed($reportProduct)); 
        return response()->json([
            'success' => true,
            'message' => 'Report-Product parmanently deleted !',
            'data' => $reportProduct
        ], 200);
    }
    
}
