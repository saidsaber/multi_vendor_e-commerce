@extends('layouts.header_tages')
<style>
    /* دائرة الألوان */
    .color-circle {
        display: inline-block;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid #ddd;
        margin: 3px;
        transition: all 0.2s ease-in-out;
    }

    input[type="radio"]:checked+.color-circle {
        border: 3px solid #007bff;
        /* أزرق */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.6);
    }

    /* بوكس المقاسات */
    .size-box {
        display: inline-block;
        padding: 5px 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin: 3px;
        transition: all 0.2s ease-in-out;
    }

    input[type="radio"]:checked+.size-box {
        border: 2px solid #007bff;
        background: #f0f8ff;
        color: #007bff;
        font-weight: bold;
    }
</style>
@section('data')
    <x-header />
    @livewire('one-product' , ['id' => $id])
@endsection
