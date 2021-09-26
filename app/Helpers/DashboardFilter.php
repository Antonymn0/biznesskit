<?php

namespace App\Helpers;

use Auth;
use App\Models\User;
use App\Models\Order;

class DashboardFilter

{
    // fetch all orders from storage
    public static function allOrders(){
        $orders = Order::paginate(env('API_PAGINATION', 10));
        $data = [
            'orders' => $orders,
            'authUser'=> Auth::user()
        ];

        return $data;
    }

    // fetch on hold orders from storage
    public static function onHold(){
        $orders = Order::where('status', 'onhold')->paginate(env('API_PAGINATION', 10));
        $data = [
            'orders' => $orders,
            'authUser'=> Auth::user()
        ];

        return $data;
    }

    // fetch on inProgress orders from storage
    public static function inProgress(){
        $orders = Order::where('status', 'inprogress')->paginate(env('API_PAGINATION', 10));
        $data = [
            'orders' => $orders,
            'authUser'=> Auth::user()
        ];

        return $data;
    }

    // fetch on revisions orders from storage
    public static function revisions(){
        $orders = Order::where('status', 'revisions')->paginate(env('API_PAGINATION', 10));
        $data = [
            'orders' => $orders,
            'authUser'=> Auth::user()
        ];

        return $data;
    }

    // fetch on complete orders from storage
    public static function complete(){
        $orders = Order::where('status', 'complete')->paginate(env('API_PAGINATION', 10));
        $data = [
            'orders' => $orders,
            'authUser'=> Auth::user()
        ];

        return $data;
    }


}
