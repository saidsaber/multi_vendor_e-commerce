@extends('layouts.header_tages')
@section('activHome', 'megamenu-container active')
{{-- @dd(count($data['cart'])) --}}
@section('data')

    <x-header :categories="$data['categories']" />
    <main>
        @if (!empty($data['categories']))
            <x-slider />
            <x-category :categories="$data['categories']" />
        @endif
        <div class="mb-5"></div>
        <x-product :products="$data['products']" />
    </main>
@endsection
