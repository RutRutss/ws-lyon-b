@extends('layouts.layout')

@section('title', 'GTIN Page')

@section('content')

    <div class=""
        style="display: flex; flex-direction: column; width: 100%; height:95vh; justify-content: center; align-items:center">
        <h1>GTIN Verification</h1>
        <div class="" style="display: flex">
            <form action="{{ route('gtin.check') }}" method="post">
                @csrf
                <textarea name="gtins" id="" cols="30" rows="10">{{ old('gtins') }}</textarea>
                <br>
                <input type="submit" value="Check">
            </form>
            @if (session('results'))
                @foreach (session('results') as $result)
                    {{ $result['status'] }}<br>
                @endforeach
            @endif
        </div>
    </div>


@endsection
