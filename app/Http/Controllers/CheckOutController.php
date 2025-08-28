<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function checkout(Order $orders)
    {
        $data = [];
        $orders->load([
            'order_items',
            'order_items.product_detail',

        ]);
        // dd($orders);
        foreach ($orders->order_items as $item) {
            $data[] = [
                'price_data' => [
                    'currency' => 'egp',
                    'product_data' => ['name' => $item->product_detail->product->name],
                    'unit_amount' => $item->product_detail->price * 100,
                ],
                'quantity' => $item->quantaty,
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
            'metadata' => [
                'order_id' => $orders->id,
                'user_id'  => auth()->id(),
            ],
        ];
        return Auth::user()->checkout(null, $sessionOptions);
    }

    public function success(Request $request)
    {
        $data = $request->user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));
        if ($data->status == "complete" && $data->payment_status == "paid") {
            $order = Order::where('id', $data->metadata->order_id)->first();
            $order->update(['payment_status' => 'paid']);
            return to_route('cart')->with('success', 'The payment was completed successfully.');
        }
    }
    public function cancel(Request $request)
    {
        $data = $request->user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));
        if ($data->status == "open" && $data->payment_status == "unpaid") {
            return to_route('cart')->with('error', 'Payment failed');
        }
    }
}
