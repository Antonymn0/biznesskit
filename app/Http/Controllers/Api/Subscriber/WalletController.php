<?php

namespace App\Http\Controllers\Api\Subscriber;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Events\walletCreated;
use App\Events\walletUpdated;
use App\Events\walletDestroyed;
use App\Http\Requests\Wallet\ValidateWallet;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallet = Wallet::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of wallets',
            'data'=>$wallet], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateWallet  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateWallet $request)
    {
        $data = $request->validated();
        $wallet= Wallet::create($data);
        event(new walletCreated($wallet));
        return response()->json([
            'success'=> true,
            'message'=> 'Wallet created successfuly',
            'data'=>$wallet],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wallet = Wallet::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single wallet retrieved successfuly',
            'data'=>$wallet], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\ValidateWallet  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateWallet $request, $id)
    {
        $data = $request->validated();
        $wallet = Wallet::findOrFail($id);
        $wallet->update($data);
        event(new walletUpdated($wallet));
        return response()->json([
            'success'=> true, 
            'message'=>'Wallet updated successfuly',
            'data'=>$wallet], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wallet = Wallet::findOrFail($id);
        $wallet->delete();
        event(new walletDestroyed($wallet));
        return response()->json([
            'success'=> true,
            'message'=> 'Wallet deleted successfuly',
            'data'=>$wallet], 200);
    }

    /**
     * Parmanently remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parmanentlyDelete($id)
    {
        $wallet = Wallet::onlyTrashed()->findOrFail($id);
        $wallet->forceDelete();
        event(new walletDestroyed($wallet)); 
        return response()->json([
            'success' => true,
            'message' => 'Wallet parmanently deleted !',
            'data' => $wallet
        ], 200);
    }
    

}
