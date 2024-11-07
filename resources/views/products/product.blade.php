@extends('layouts.layout')

@section('title', 'Login Page')

@section('content')
    @if ($product)
        <div class="nav">
            @if (session('message'))
                <div class="">{{ session('message') }}</div>
            @endif
            <h1 style="">Product : {{ $product->name_en }}</h1>
            <a href="{{ route('products') }}">Back to All Products</a>
        </div>
        <div class="">
            <h2>Product Info</h2>
            @if ($product->img)
                <img src="{{ asset('public/storage/images/' . $product->img) }}" alt="Product Image"
                    style="width:500px; height:auto">
            @else
                <img src="{{ asset('public/storage/images/default.jpg') }}" alt="Product Image"
                    style="width:500px; height:auto">
            @endif

            <form method="POST" action="{{ route('product.image.update', ['gtin' => $product->gtin]) }}"
                enctype="multipart/form-data">
                @csrf
                <input type="file" name="img" id="">
                <input type="submit" value="เปลี่ยนภาพ">
            </form>

            <a href="{{ route('product.image.delete', ['gtin' => $product->gtin]) }}" style="color: red">ลบภาพ</a>
            <br>
            <br>
            <div class="">Product GTIN : {{ $product->gtin }}</div>
            <div class="">Product name EN : {{ $product->name_en }}</div>
            <div class="">Product name FR : {{ $product->name_fr }}</div>
            <div class="">Product description_en : {{ $product->description_en }}</div>
            <div class="">Product description_fr : {{ $product->description_fr }}</div>
            <div class="">Product brand : {{ $product->brand }}</div>
            <div class="">Product country_of_origin : {{ $product->country_of_origin }}</div>
            <div class="">Product weight_gross : {{ $product->weight_gross }}</div>
            <div class="">Product weight_net : {{ $product->weight_net }}</div>
            <div class="">Product weight_unit : {{ $product->weight_unit }}</div>
            <div class="">Product status : {{ $product->is_hide == 0 ? 'SHOW' : 'HIDE' }}</div>
        </div>
    @endif

@endsection
