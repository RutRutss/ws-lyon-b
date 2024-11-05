@extends('layouts.layout')

@section('title', 'Login Page')

@section('content')
    <div class="nav">
        <h1 style="">All Companies</h1>
        <div class="">
            <a style="color:red" href="{{ route('logout') }}">logout</a>
        </div>
    </div>
    <div class="">
        @if ($companies)
            @foreach ($companies as $company)
                <div class=""><strong>Company Name : </strong>{{ $company->company_name }} <a style="color:green"
                        href="{{ route('company', ['id' => $company->id]) }}">View</a></div>
            @endforeach
        @endif
    </div>

@endsection
