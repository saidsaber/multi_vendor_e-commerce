<?php

namespace App\Http\Controllers;

use App\Models\Order_Item;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Refund_Request;

class ReturnController extends Controller
{
    public function create(Order_Item $order_Item)
    {
        $order_Item->load([
            'product_detail.product'
        ]);
        $page = 'refund_request';
        return view('dashboard', compact('order_Item', 'page'));
    }

    public function store(Request $request, Order_Item $order_Item)
    {
        $request->validate([
            'reason' => 'required|string|max:1000',
        ]);
        Refund_Request::create([
            'user_id' => auth()->id(),
            'order_item_id' => $order_Item->id,
            'product_detail_id' => $order_Item->product_detail->id,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);
        
        return redirect()->back()->with('success', 'Your return request has been submitted');
        // dd($order_Item);
    }
}
