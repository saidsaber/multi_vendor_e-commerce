@extends('layouts.header_tages')
@section('activHome' , 'megamenu-container active')

@section('data')
<x-header/>
<main>
    <x-slider/>
    <x-category :categories="$data['categories']"/>
    <div class="mb-5"></div>    
    <x-product :products="$data['products']"/>
</main>
@endsection