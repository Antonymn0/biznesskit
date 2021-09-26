<?php

namespace App\Http\Controllers\Api\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Events\reportCreated;
use App\Events\reportUpdated;
use App\Events\reportDestroyed;
use App\Http\Requests\Report\ValidateReport;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = Report::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of reports',
            'data'=>$report], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateReport  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateReport $request)
    {
        $data = $request->validated();
        $report = Report::create($data);
        event(new reportCreated($report));
        return response()->json([
            'success'=> true,
            'message'=> 'Report created successfuly',
            'data'=>$report],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single report retrieved successfuly',
            'data'=>$report], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateReport  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateReport $request, $id)
    {
        $data = $request->validated();
        $report = Report::findOrFail($id);
        $report->update($data);
        event(new reportUpdated($report));
        return response()->json([
            'success'=> true, 
            'message'=>'Report updated successfuly',
            'data'=>$report], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        event(new reportDestroyed($report));
        return response()->json([
            'success'=> true,
            'message'=> 'Report deleted successfuly',
            'data'=>$report], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $report = Report::onlyTrashed()->findOrFail($id);
        $report->forceDelete();
        event(new reportDestroyed($report)); 
        return response()->json([
            'success' => true,
            'message' => 'Report parmanently deleted !',
            'data' => $report
        ], 200);
    }
    
}
