<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Item;
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
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel') . '?session_id={CHECKOUT_SESSION_ID}',
            'line_items' => [
                [
                    $data
                ],
            ],
        ];

        // dd(Auth::user()->checkout(null , $sessionOptions));
        return Auth::user()->checkout(null, $sessionOptions);
    }

    public function success(Request $request)
    {
        $data = $request->user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));
        $order = [
            'user_id' => Auth::id(),
            'total' => $data->amount_total / 100,
            'status' => 'paid',
            'payment_method' => $data->id,
            'payment_status' => 'paid',
        ];
        if ($data->status == "complete" && $data->payment_status == "paid") {
            $id = Order::create($order)->id;
            $carts = Cart::with('productDetail')->where('user_id', Auth::id())->get();
            foreach ($carts as $cart) {
                Order_Item::create([
                    'order_id' => $id,
                    'product_detail_id' => $cart->product_detail_id,
                    'quantaty' => $cart->quantaty,
                    'price' => $cart->productDetail->price
                ]);
                $cart->delete();
            }
            return to_route('cart')->with('success' , 'The payment was completed successfully.');
        }
    }
    public function cancel(Request $request)
    {
        $data = $request->user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));
        if ($data->status == "open" && $data->payment_status == "unpaid") {
            dd('Payment failed');
        }
    }
}
