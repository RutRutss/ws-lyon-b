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

            <h2>Owner Info</h2>
            <div class="">owner's name : {{ $owner->name }}</div>
            <div class="">owner's mobile number : {{ $owner->mobile_number }}</div>
            <div class="">owner's email address : {{ $owner->email }}</div>

            <h2>Contact Info</h2>
            <div class="">contact's name : {{ $contact->name }}</div>
            <div class="">contact's mobile number : {{ $contact->mobile_number }}</div>
            <div class="">contact's email address : {{ $contact->email }}</div>
        </div>

        <div class="">
            <h2>Product of <strong>{{ $company->company_name }}</strong> Company</h2>
            @foreach ($products as $product)
                <div class=""> -> {{ $product->name_en }}</div>
            @endforeach
        </div>
    @endif

@endsection
