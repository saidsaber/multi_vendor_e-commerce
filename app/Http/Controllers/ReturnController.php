<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Refund_Request;

class ReturnController extends Controller
{
    public function create(Order $order)
    {
        $order->load([
            'order_items.product_detail.product'
        ]);
        $page = 'refund_request';
        return view('dashboard', compact('order', 'page'));
    }

    public function store(Request $request, Order $order)
    {
        $request->validate([
            'product_id' => 'required|exists:product_details,id',
            'reason' => 'required|string|max:1000',
        ]);

        Refund_Request::create([
            'user_id' => auth()->id(),
            'order_id' => $order->id,
            'product_detail_id' => $request->product_id,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Your return request has been submitted');
    }
}
