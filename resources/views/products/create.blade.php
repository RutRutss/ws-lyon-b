@extends('layouts.layout')

@section('title', 'Create Product Page')

@section('content')
    <div class="">
        @if (session('message'))
            <div class="" style="color: green">{{ session('message') }}</div>
        @endif
        <a href="{{ route('products') }}">Back to All Products</a>
        <h1>Create New Product</h1>
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <h2>Product Info</h2>
            <label for="">name_en :</label>
            <input type="text" name="name_en" id="">
            <br>
            <label for="">name_fr : </label>
            <input type="text" name="name_fr" id="">
            <br>
            <label for="">description_en</label>
            <textarea name="description_en" id="" cols="30" rows="5"></textarea>
            <br>
            <label for="">description_fr</label>
            <textarea name="description_fr" id="" cols="30" rows="5"></textarea>
            <br>
            <label for="">gtin</label>
            <input type="text" name="gtin" id="">
            <br>
            <label for="">brand</label>
            <input type="text" name="brand">
            <br>
            <label for="">country_of_origin</label>
            <input type="text" name="country_of_origin">
            <br>
            <label for="">weight_gross</label>
            <input type="number" name="weight_gross" id="">
            <br>
            <label for="">weight_net</label>
            <input type="number" name="weight_net" id="">
            <br>
            <label for="">weight_unit</label>
            <input type="text" name="weight_unit" id="">
            <br>
            <label for="">company id</label>
            <select name="company_id" id="">
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>
            <br>
            <label for="">product image : </label>
            <input type="file" name="img" id="" accept=".jpg, .jpeg, .png">
            <br>
            <input type="submit" value="Create New Product">
        </form>
    </div>

@endsection
