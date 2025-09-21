<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_Detail;
use App\Models\Vendor_Order;
use App\Models\Wish_List;
use Illuminate\Pagination\Paginator;
use App\Policies\Vendor\VendorOrderPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use App\Policies\Vendor\ProductPolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::policy(Product::class, ProductPolicy::class);
        Gate::policy(Vendor_Order::class, VendorOrderPolicy::class);
        View::composer('*', function ($view) {
            $cartCount = 0;
            $wishListCount = 0;
            if (Auth::check()) {
                $cartCount = Cart::where('user_id', Auth::id())->count();
                $wishListCount = Wish_List::where('user_id', Auth::id())->count();
            }

            $view->with([
                'cartCount' => $cartCount,
                'wishListCount' => $wishListCount,
            ]);
        });
        View::composer('*', function ($view) {
            $name = '';
            if (Auth::guard('vendor')->check()) {
                $name = Auth::guard('vendor')->user()->store->name;
            }
            if (Auth::guard('admin')->check()) {
                $name = Auth::guard('admin')->user()->name;
            }

            $view->with([
                'name' => $name,
            ]);
        });

        Paginator::useBootstrapFive();
    }
}
