<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('dashboard', ['orders' => $orders, 'page' => 'orders']);
    }

    public function order(Order $order)
    {
        $order->load([
            'order_items',
            'order_items.product_detail',
            'order_items.product_detail.refund_requests',
            'order_items.product_detail.size',
            'order_items.product_detail.color',
            'order_items.product_detail.images',
            'order_items.product_detail.product.category',
            'order_items.product_detail.product.colors'
        ]);
        return view('dashboard', ['orders' => $order, 'page' => 'order']);
    }

    public function cancellOrder(Order $order)
    {

        if ($order->status == 'panding' || $order->status == 'paid') {
            $order->update(['status' => 'cancelled']);
            return redirect()->back()->with('success', 'Refund request is under review');
        }

        return redirect()->back()->with('error', 'The order cannot be cancelled');
    }

    public function createOrder(Request $request)
    {
        $carts = Cart::with('productDetail')->where('user_id', Auth::id())->get();
        if (!empty($carts[0])) {
            $total = 0;
            foreach ($carts as $cart) {
                $total += $cart->productDetail->price * $cart->quantaty;
            }
            $total += 50;

            $order = [
                'user_id' => Auth::id(),
                'total' => $total,
                'status' => 'panding',
                'payment_method' => $request->payment_method == 'cod' ? 'Cash on delivery' : 'visa',
                'payment_status' => 'panding',
            ];

            $id = Order::create($order)->id;
            foreach ($carts as $cart) {
                Order_Item::create([
                    'order_id' => $id,
                    'product_detail_id' => $cart->product_detail_id,
                    'quantaty' => $cart->quantaty,
                    'price' => $cart->productDetail->price
                ]);
                $cart->delete();
            }
            if($request->payment_method == 'visa'){
                return to_route('checkout' , $id);
            }
        }
        return redirect()->back();
    }
}
