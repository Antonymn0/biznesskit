<?php

namespace App\Http\Controllers\Api\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Events\inventoryCreated;
use App\Events\inventoryUpdated;
use App\Events\inventoryDestroyed;
use App\Http\Requests\Inventory\ValidateInventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = Inventory::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of inventorys',
            'data'=>$inventory], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateInventory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateInventory $request)
    {
        $data = $request->validated();
        $inventory = Inventory::create($data);
        event(new inventoryCreated($inventory));
        return response()->json([
            'success'=> true,
            'message'=> 'Inventory created successfuly',
            'data'=>$inventory],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventory::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single inventory retrieved successfuly',
            'data'=>$inventory], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateInventory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateInventory $request, $id)
    {
        $data = $request->validated();
        $inventory = Inventory::findOrFail($id);
        $inventory->update($data);
        event(new inventoryUpdated($inventory));
        return response()->json([
            'success'=> true, 
            'message'=>'Inventory updated successfuly',
            'data'=>$inventory], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        event(new inventoryDestroyed($inventory));
        return response()->json([
            'success'=> true,
            'message'=> 'Inventory deleted successfuly',
            'data'=>$inventory], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $inventory = Inventory::onlyTrashed()->findOrFail($id);
        $inventory->forceDelete();
        event(new inventoryDestroyed($inventory)); 
        return response()->json([
            'success' => true,
            'message' => 'Inventory deleted parmanently!',
            'data' => $inventory
        ], 200);
    }
    
}
