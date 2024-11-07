@extends('layouts.layout')

@section('title', 'Login Page')

@section('content')
    <div class="nav" style="margin-bottom: 20px">
        @if (session('message'))
            <div class="">{{ session('message') }}</div>
        @endif
        <h1 style="">All Product</h1>
        <div class="">
            <a style="color:blue" href="{{ route('company.create') }}">New Product</a> |
            <a href="{{ route('companies') }}">All Companies</a> |
            <a style="color:red" href="{{ route('logout') }}">logout</a>
        </div>
    </div>
    <h2>Company Show</h2>
    <div class="" style="display: flex; flex-wrap: wrap; justify-content:center">
        @if ($products_show->isNotEmpty())
            @foreach ($products_show as $product_show)
                <div class="" style="width: 20rem; height: auto; border:1px solid; margin: 10px; padding:1rem">
                    <strong>{{ $product_show->name_en }}</strong>
                    <p>GTIN : {{ $product_show->gtin }}</p>
                    <p>Desc : {{ $product_show->description_en }}</p>
                    <p>By Company : {{ $product_show->company_name }}</p>
                    <a style="color:green" href="{{ route('product', ['gtin' => $product_show->gtin]) }}">View</a> |
                    {{-- <a href="{{ route('company.edit', ['id' => $product_show->id]) }}">Edit</a> | --}}
                    <a href="{{ route('product.hide', ['gtin' => $product_show->gtin]) }}">Hide/Unhide</a>
                </div>
            @endforeach
        @else
            <div class="">** Not Found Products is Active **</div>
        @endif
    </div>

    <h2>Company Hide</h2>
    <div class="" style="display: flex; flex-wrap: wrap; justify-content:center; color:gray">
        @if ($products_hide->isNotEmpty())
            @foreach ($products_hide as $product_hide)
                <div class="" style="width: 20rem; height: auto; border:1px solid; margin: 10px; padding:1rem">
                    <strong>{{ $product_hide->name_en }}</strong>
                    <p>GTIN : {{ $product_hide->gtin }}</p>
                    <p>Desc : {{ $product_hide->description_en }}</p>
                    <p>By Company : {{ $product_hide->company_name }}</p>
                    <a style="color:green" href="{{ route('company', ['id' => $product_hide->id]) }}">View</a> |
                    {{-- <a href="{{ route('company.edit', ['id' => $product_hide->id]) }}">Edit</a> | --}}
                    <a href="{{ route('product.hide', ['gtin' => $product_hide->gtin]) }}">Hide/Unhide</a>
                    <a href="{{ route('product.delete', ['gtin' => $product_hide->gtin]) }}" style="color: red">Delete</a>
                </div>
            @endforeach
        @else
            <div class="">** Not Found Products is Hide **</div>
        @endif
    </div>

@endsection
