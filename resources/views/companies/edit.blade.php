@extends('layouts.layout')

@section('title', 'Edit Company')

@section('content')

    <div class="">
        @if (session('message'))
            <div class="" style="color: green">{{ session('message') }}</div>
        @endif
        <a href="{{ route('companies') }}">Back to All Companies</a>

        <h1>Edit Company : {{ $company->company_name }}</h1>

        <form method="POST" action="{{ route('company.update', $company->id) }}">
            @csrf
            @method('PUT')
            <h2>Company Info</h2>
            <label for="">Company Name :</label>
            <input type="text" name="company_name" id="" value="{{ $company->company_name }}">
            <br>
            <label for="">Company Address</label>
            <textarea name="company_address" id="" cols="25" rows="5">{{ $company->company_address }}</textarea>
            <br>
            <label for="">Company Telephone</label>
            <input type="text" name="company_telephone" id="" value="{{ $company->company_telephone }}">
            <br>
            <label for="">Company Email</label>
            <input type="email" name="company_email" id="" value="{{ $company->company_email }}">
            <br>
            <h2>Owner Info</h2>
            <label for="">Owner Name</label>
            <input type="text" name="owner_name" id="" value="{{ $owner->name }}">
            <br>
            <label for="">Owner Mobile Number</label>
            <input type="text" name="owner_mobile_number" value="{{ $owner->mobile_number }}">
            <br>
            <label for="">Owner Email</label>
            <input type="email" name="owner_email" id="" value="{{ $owner->email }}">
            <h2>Contact Info</h2>
            <label for="">Contact Name</label>
            <input type="text" name="contact_name" id="" value="{{ $contact->name }}">
            <br>
            <label for="">Contact Mobile Number</label>
            <input type="text" name="contact_mobile_number" id="" value="{{ $contact->mobile_number }}">
            <br>
            <label for="">Contact Email</label>
            <input type="email" name="contact_email" id="" value="{{ $contact->email }}">
            <br>
            <input type="submit" value="Edit Company Info">
        </form>
    </div>

@endsection
