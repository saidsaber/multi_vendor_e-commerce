<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function checkout(Request $request)
    {
        $data = [];
        $carts = Cart::with([
            'productDetail',
            'productDetail.size',
            'productDetail.color',
            'productDetail.images',
            'productDetail.product',
            'productDetail.product.colors',
            'productDetail.product.sizes',
        ])->where('user_id', Auth::id())->get();

        foreach ($carts as $cart) {
            $data[] = [
                'price_data' => [
                    'currency' => 'egp',
                    'product_data' => ['name' => $cart->productDetail->product->name],
                    'unit_amount' => $cart->productDetail->price * 100,
                ],
                'quantity' => $cart->quantaty,
            ];
        }
        // dd($data);

        $sessionOptions = [
            'cancel_url' => route('checkout.cancel'),
            'success_url' => route('checkout.success'),
            'line_items' => [
                [
                    $data
                ],
            ],
        ];

        // dd(Auth::user()->checkout(null , $sessionOptions));
        return Auth::user()->checkout(null , $sessionOptions);
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
