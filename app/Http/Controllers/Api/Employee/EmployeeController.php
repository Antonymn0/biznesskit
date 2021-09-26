<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Events\employeeCreated;
use App\Events\employeeUpdated;
use App\Events\employeeDestroyed;
use App\Http\Requests\Employee\ValidateEmployee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of employees',
            'data'=>$employee], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateEmployee  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateEmployee $request)
    {
        $data = $request->validated();
        $employee = Employee::create($data);
        event(new employeeCreated($employee));
        return response()->json([
            'success'=> true,
            'message'=> 'Employee created successfuly',
            'data'=>$employee],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single employee retrieved successfuly',
            'data'=>$employee], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateEmployee  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateEmployee $request, $id)
    {
        $data = $request->validated();
        $employee = Employee::findOrFail($id);
        $employee->update($data);
        event(new employeeUpdated($employee));
        return response()->json([
            'success'=> true, 
            'message'=>'Employee updated successfuly',
            'data'=>$employee], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        event(new employeeDestroyed($employee));
        return response()->json([
            'success'=> true,
            'message'=> 'Employee deleted successfuly',
            'data'=>$employee], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $employee = Employee::onlyTrashed()->findOrFail($id);
        $employee->forceDelete();
        event(new employeeDestroyed($employee)); 
        return response()->json([
            'success' => true,
            'message' => 'Employee deleted parmanently!',
            'data' => $employee
        ], 200);
    }

}
