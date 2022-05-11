@extends('layouts.app')
@section('content')
@foreach($cats as $cat)
    <h1 class="text-4xl">{{$cat->name}}</h1>
    @endforeach
@endsection
