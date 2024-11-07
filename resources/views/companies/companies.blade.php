@extends('layouts.layout')

@section('title', 'Login Page')

@section('content')
    <div class="nav" style="margin-bottom: 20px">
        @if (session('message'))
            <div class="">*** {{ session('message') }} ***</div>
        @endif
        <h1 style="">All Companies</h1>
        <div class="">
            <a style="color:blue" href="{{ route('company.create') }}">New Company</a> |
            <a href="{{ route('products') }}">All Products</a> |
            <a style="color:red" href="{{ route('logout') }}">logout</a>
        </div>
    </div>
    <div class="">
        <h2>Company Show</h2>
        @if ($companies_show->isNotEmpty())
            @foreach ($companies_show as $company_show)
                <div class=""><strong>Company Name : </strong>{{ $company_show->company_name }} <a style="color:green"
                        href="{{ route('company', ['id' => $company_show->id]) }}">View</a> |
                    <a href="{{ route('company.edit', ['id' => $company_show->id]) }}">Edit</a> |
                    <a href="{{ route('company.hide', ['id' => $company_show->id]) }}">Hide/Unhide</a>
                </div>
            @endforeach
        @else
            <div class="">** Not Found Company is Active **</div>
        @endif
        <h2>Company Hide</h2>
        @if ($companies_hide->isNotEmpty())
            @foreach ($companies_hide as $company_hide)
                <div class="" style="color:gray"><strong>Company Name : </strong>{{ $company_hide->company_name }} <a
                        style="color:green" href="{{ route('company', ['id' => $company_hide->id]) }}">View</a> |
                    <a href="{{ route('company.edit', ['id' => $company_hide->id]) }}">Edit</a> |
                    <a href="{{ route('company.hide', ['id' => $company_hide->id]) }}">Hide/Unhide</a>
                </div>
            @endforeach
        @else
            <div class="">** Not Found Company is Hide **</div>
        @endif
    </div>

@endsection
