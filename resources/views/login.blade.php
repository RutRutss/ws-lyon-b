@extends('layouts.layout')

@section('title', 'Login Page')

@section('content')
    <div class="container-center">
        @if (session('message'))
            <div>{{ session('message') }}</div>
        @endif
        <h1>Login</h1>
        <form action="{{ route('auth') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Username : </label>
                <input type="text" name="username" id="">
            </div>
            <div class="form-group">
                <label for="">Password : </label>
                <input type="password" name="password" id="">
            </div>
            <input type="submit" value="Login" />
        </form>
    </div>
@endsection
