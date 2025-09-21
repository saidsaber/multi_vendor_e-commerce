<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
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
        $data = [
            'orders' => $orders,
            'totalSale' => Product::where('store_id', Auth::guard('vendor')->user()->store->id)->sum('sale'),
            'topProduct' => Product::where('store_id', Auth::guard('vendor')->user()->store->id)->orderByDesc('sale')->get(),
        ];

        return view('vendor.main', ['data' => $data]);
    }
}
