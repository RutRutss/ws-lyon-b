@extends('layouts.layout')

@section('title', 'Create Company Page')

@section('content')

    <div class="">
        @if (session('message'))
            <div class="" style="color: green">{{ session('message') }}</div>
        @endif
        <a href="{{route('companies')}}">Back to All Companies</a>
        <h1>Create New Company</h1>
        <form method="POST" action="{{ route('company.store') }}">
            @csrf
            <h2>Company Info</h2>
            <label for="">Company Name :</label>
            <input type="text" name="company_name" id="">
            <br>
            <label for="">Company Address</label>
            <textarea name="company_address" id="" cols="25" rows="5"></textarea>
            <br>
            <label for="">Company Telephone</label>
            <input type="text" name="company_telephone" id="">
            <br>
            <label for="">Company Email</label>
            <input type="email" name="company_email" id="">
            <br>
            <h2>Owner Info</h2>
            <label for="">Owner Name</label>
            <input type="text" name="owner_name" id="">
            <br>
            <label for="">Owner Mobile Number</label>
            <input type="text" name="owner_mobile_number">
            <br>
            <label for="">Owner Email</label>
            <input type="email" name="owner_email" id="">
            <h2>Contact Info</h2>
            <label for="">Contact Name</label>
            <input type="text" name="contact_name" id="">
            <br>
            <label for="">Contact Mobile Number</label>
            <input type="text" name="contact_mobile_number" id="">
            <br>
            <label for="">Contact Email</label>
            <input type="email" name="contact_email" id="">
            <br>
            <input type="submit" value="Add New Company">
        </form>
    </div>

@endsection
