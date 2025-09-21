<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'user:id,name',
            'order_items.product_detail:id,product_id,price',
            'order_items.product_detail.product:id,name'
        ])
            ->whereHas('order_items.product_detail.product', function ($query) {
                $query->where('store_id', Auth::guard('vendor')->user()->store->id);
            })
            ->get();
        return view('vendor.orders', ['orders' => $orders]);
    }


    public function order_item(Order $order)
    {
        $order->load([
            'user:id,name',
            'order_items.product_detail:id,product_id,price',
            'order_items.product_detail.product:id,name'
        ])->whereHas('order_items.product_detail.product', function ($query) {
            $query->where('store_id', Auth::guard('vendor')->user()->store->id);
        });
        // dd($order);
        return view('vendor.orderItems', ['orders' => $order]);
    }
}
