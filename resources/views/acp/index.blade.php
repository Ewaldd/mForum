@extends('acp.layout')
@section('content')
    <div class="container mx-auto mt-4">
        <h2 class="text-center text-4xl text-white">Hello, {{auth()->user()->name}}</h2>
    </div>
@endsection
