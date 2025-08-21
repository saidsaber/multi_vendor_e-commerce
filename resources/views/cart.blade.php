@extends('layouts.header_tages')
@section('activCart' , 'megamenu-container active')
@section('data')
    <x-header />
    <main>
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
            </div><!-- End .container -->
        </div>
        <div class="mb-5"></div>
        <div class="page-content">
            <div class="cart">
                <div class="container">
                    @livewire('cart')
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div>
    </main>
@endsection
