@extends('layouts.admin.header_tags')

@section('body')
    <x-admin.header />
    <!-- ======= Header ======= -->

    <!-- ======= Sidebar ======= -->

    <x-vendor.sidebar isactive='review' />
    <main id="main" class="main">

        @livewire('vendor.product-reviews')

    </main><!-- End #main -->
@endsection
