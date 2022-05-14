@extends('layouts.app')
@section('content')
    <div class="container mx-auto bg-gray-200 rounded text-gray-800 p-4 flex flex-col space-y-4">
        <div class="bg-gray-400 border-gray-500 rounded text-white p-4 flex items-center">
            <div class="w-1/6 align-bottom text-center">
                <p class="text-xl">
                    <a href="{{route('user_show', ['name' => $post->user->name])}}">
                        {{$post->user->name}}
                    </a>
                </p>
                <p>
                    Created: {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                </p>
            </div>
            <div class="w-5/6 flex flex-col">
                <div class="title text-left border-b-2 border-b-gray-700">
                    <p class="text-xl">{{$post->title}}</p>
                </div>
                <div class="content mt-4">
                    <p>
                        {{$post->content}}
                    </p>
                </div>
            </div>
        </div>
        @foreach($post->replies as $reply)
            <div class="bg-gray-400 border-gray-500 rounded text-white p-4 flex items-center">
                <div class="w-1/6 align-bottom text-center">
                    <p class="text-xl">
                        <a href="{{route('user_show', ['name' => $reply->user->name])}}">
                            {{$reply->user->name}}
                        </a>
                    </p>
                    <p>
                        Created: {{\Carbon\Carbon::parse($reply->created_at)->diffForHumans()}}
                    </p>
                </div>
                <div class="w-5/6 flex flex-col">
                    <p>
                        {{$reply->content}}
                    </p>
                </div>
            </div>
        @endforeach
        @auth
            <div class="bg-gray-400 border-gray-500 rounded text-white p-4 flex items-center">
                <form action="{{route('post_add', ['id' => $post->id])}}" method="post">
                    @csrf
                    <div>
                        <label for="post" class="block text-xl font-medium text-white"> Add reply </label>
                        <div class="mt-1">
                            <textarea id="post" cols="250" rows="5" required name="post" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full h-full text-black resize-none sm:text-sm border border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>
                    @error('post')
                    <span class="text-red-500">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="px-4 py-3 text-center sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add reply</button>
                    </div>
                </form>
            </div>
        @endauth
    </div>
@endsection
