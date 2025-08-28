<?php

namespace App\Providers;

use App\Models\Wish_List;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

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
    }
}
