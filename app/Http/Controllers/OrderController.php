<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Vendor_Order;
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
            'order_items.refund_requests',
            'order_items.product_detail.size',
            'order_items.product_detail.color',
            'order_items.product_detail.images',
            'order_items.product_detail.product.category',
            'order_items.product_detail.product.colors'
        ]);
        return view('dashboard', ['orders' => $order, 'page' => 'order']);
    }

    public function cancellOrder(Order_Item $order_item)
    {

        if ($order_item->status == 'panding') {
            $order_item->delete();
            return redirect()->back()->with('success', 'The Order Is Cancelled');
        }

        return redirect()->back()->with('error', 'The order cannot be cancelled');
    }

    public function createOrder(Request $request)
    {

        $validation = $request->validate([
            'payment_method' => 'required',
            'address_id' => 'required',
        ]);
        // dd($request->all());
        $carts = Cart::with('productDetail', 'productDetail.product')
            ->where('user_id', Auth::id())
            ->get();
        if ($carts->isNotEmpty()) {
            $total = 0;
            foreach ($carts as $cart) {
                $total += $cart->productDetail->price * $cart->quantaty;
            }
            $total += 50;

            $order = [
                'user_id'        => Auth::id(),
                'total'          => $total,
                'payment_method' => $request->payment_method == 'cod' ? 'Cash on delivery' : 'visa',
                'payment_status' => 'panding',
            ];

            $id = Order::create($order)->id;

            $stores = [];
            $vendor_order_id = null;
            foreach ($carts as $cart) {
                if (!array_key_exists($cart->productDetail->product->store_id, $stores)) {
                    $stores[$cart->productDetail->product->store_id] = Vendor_Order::create(['order_id' => $id, 'store_id' => $cart->productDetail->product->store_id]);
                }
                $vendor_order_id = $stores[$cart->productDetail->product->store_id]->id;
                if ($cart->productDetail->stock >= $cart->quantaty) {
                    Order_Item::create([
                        'vendor_order_id'   => $vendor_order_id,
                        'order_id'   => $id,
                        'product_detail_id' => $cart->product_detail_id,
                        'quantaty'          => $cart->quantaty,
                        'price'             => $cart->productDetail->price
                    ]);

                    $cart->productDetail->update([
                        'stock' => $cart->productDetail->stock - $cart->quantaty
                    ]);

                    $cart->productDetail->product->increment('sale');

                    if ($cart->productDetail->stock - $cart->quantaty <= 0) {
                        $cart->productDetail->update(['status' => 'unavailable']);
                    }

                    $cart->delete();
                }
            }

            if ($request->payment_method == 'visa') {
                return to_route('checkout', $id);
            }
        }

        return to_route('thanks');
    }
}
