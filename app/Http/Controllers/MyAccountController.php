<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import Order model ans Auth
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
//----------------------------

class MyAccountController extends Controller
{
    public function orders()  {
        $accountData=[];
        $accountData['title']='Mis pedidos - Tienda Online';
        $accountData['subtitle']='Mis pedidos';
        $accountData['orders']= Order::where('user_id',Auth::user()->id)->get();
        return view('myaccount.orders')->with('accountData',$accountData);
    }
}
