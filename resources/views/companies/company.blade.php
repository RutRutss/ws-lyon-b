@extends('layouts.layout')

@section('title', 'Login Page')

@section('content')
    @if ($company)
        <div class="nav">
            <h1 style="">Company : {{ $company->company_name }}</h1>
        </div>
        <div class="">
            <h2>Company Info</h2>
            <div class="">company name : {{ $company->company_name }}</div>
            <div class="">company address : {{ $company->company_address }}</div>
            <div class="">company telephone number : {{ $company->company_telephone }}</div>
            <div class="">company email address : {{ $company->company_email }}</div>

            @if ($owner)
                <h2>Owner Info</h2>
                <div class="">owner's name : {{ $owner->name }}</div>
                <div class="">owner's mobile number : {{ $owner->mobile_number }}</div>
                <div class="">owner's email address : {{ $owner->email }}</div>
            @endif

            @if ($contact)
                <h2>Contact Info</h2>
                <div class="">contact's name : {{ $contact->name }}</div>
                <div class="">contact's mobile number : {{ $contact->mobile_number }}</div>
                <div class="">contact's email address : {{ $contact->email }}</div>
            @endif

        </div>

        @if ($products->isNotEmpty())
            <div class="">
                <h2>Product of <strong>{{ $company->company_name }}</strong> Company</h2>
                @foreach ($products as $product)
                    <div style="color: {{ $product->is_hide == 1 ? 'gray' : 'black' }};">
                       * {{ $product->name_en }} -> status : {{ $product->is_hide == 1 ? 'hide' : 'active' }}
                    </div>
                @endforeach
            </div>
        @endif

    @endif

@endsection
