<?php

namespace App\Http\Controllers\Api\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Events\settingCreated;
use App\Events\settingUpdated;
use App\Events\settingDestroyed;
use App\Http\Requests\Setting\ValidateSetting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of settings',
            'data'=>$setting], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateSetting  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateSetting $request)
    {
        $data = $request->validated();
        $setting = Setting::create($data);
        event(new settingCreated($setting));
        return response()->json([
            'success'=> true,
            'message'=> 'Setting created successfuly',
            'data'=>$setting],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = Setting::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single setting retrieved successfuly',
            'data'=>$setting], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request/ValidateSetting  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateSetting $request, $id)
    {
        $data = $request->validated();
        $setting = Setting::findOrFail($id);
        $setting->update($data);
        event(new settingUpdated($setting));
        return response()->json([
            'success'=> true, 
            'message'=>'Setting updated successfuly',
            'data'=>$setting], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        event(new settingDestroyed($setting));
        return response()->json([
            'success'=> true,
            'message'=> 'Setting deleted successfuly',
            'data'=>$setting], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $setting = Setting::onlyTrashed()->findOrFail($id);
        $setting->forceDelete();
        event(new settingDestroyed($setting)); 
        return response()->json([
            'success' => true,
            'message' => 'Setting parmanently deleted !',
            'data' => $setting
        ], 200);
    }
    
}
