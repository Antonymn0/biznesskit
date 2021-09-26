<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Events\adminCreated;
use App\Events\adminUpdated;
use App\Events\adminDestroyed;
use App\Http\Requests\Admin\ValidateAdmin;
use App\Http\Requests\Admin\UpdateAdmin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of admins',
            'data'=>$admin], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateAdmin  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateAdmin $request)
    {
        $data = $request->validated();
        $admin = Admin::create($data);
        event(new adminCreated($admin));
        return response()->json([
            'success'=> true,
            'message'=> 'Admin created successfuly',
            'data'=>$admin],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single admin retrieved successfuly',
            'data'=>$admin], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\updateAdmin  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdmin $request, $id)
    {
        $data = $request->validated();
        $admin = Admin::findOrFail($id);
        $admin->update($data);
        event(new adminUpdated($admin));
        return response()->json([
            'success'=> true, 
            'message'=>'Admin updated successfuly',
            'data'=>$admin], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        event(new adminDestroyed($admin));
        return response()->json([
            'success'=> true,
            'message'=> 'Admin deleted successfuly',
            'data'=>$admin], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $admin = Admin::onlyTrashed()->findOrFail($id);
        $admin->forceDelete();
        event(new adminDestroyed($admin)); 
        return response()->json([
            'success' => true,
            'message' => 'Admin deleted parmanently!',
            'data' => $admin
        ], 200);
    }
}
