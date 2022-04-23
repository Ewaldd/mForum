@extends('layouts.app')

@section('content')
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl">Hello, {{auth()->user()->name}}</h2>
    </div>
@endsection
