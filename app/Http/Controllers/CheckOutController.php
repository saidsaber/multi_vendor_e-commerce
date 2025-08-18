<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckOutController extends Controller
{
    public function checkout(Request $request)
    {
        $sessionOptions = [
            'cancel_url' => route('checkout.cancel'),
            'success_url' => route('checkout.success'),
        ];

        // dd(Auth::user()->checkoutCharge(6000 , 'said saber',sessionOptions: $sessionOptions));
        return Auth::user()->checkoutCharge(6000, 'said saber', sessionOptions: $sessionOptions);
    }

    public function success()
    {
        dd('success');
    }
    public function cancell()
    {
        dd('cancel');
    }
}
