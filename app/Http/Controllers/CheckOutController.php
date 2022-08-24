<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        // return Auth::id();
        $cartitems = Cart::where('user_id', Auth::id())->get();

        // return $cartitems;

        return view('dashboard.checkout', [
            'cartitems' => $cartitems
        ]);
    }
}
