@extends('layouts.app')
@section('content')
    <div class="container mx-auto bg-gray-200 rounded text-gray-800 p-4 flex flex-col space-y-4">
        <div class="bg-gray-300 rounded p-2 space-y-4">
            <h2 class="text-2xl">SubCategories</h2>
            @foreach($category->sub_categories as $cat)
                <div class="bg-gray-400 border-gray-500 rounded text-white p-4 flex">
                    <div class="flex-1 w-1/2">
                        <h1 class="text-4xl"><a
                                href="{{route('category_show', ['id' => $cat->id, 'slug' => $cat->slug])}}">
                                {{$cat->name}}
                            </a></h1>
                    </div>
                    <div class="flex w-1/2 -space-x-6 mt-2 flex-col md:flex-row">
                        <div class="flex flex-col text-center w-1/3">
                            <b class="text-2xl">{{$cat->posts_count}}</b>
                            <p class="text-sm">Topics</p>
                        </div>
                        <div class="hidden md:flex w-full md:w-1/2 flex-col text-center md:text-left">
                            @if($cat->posts_count > 0)
                                <div class="truncate overflow-hidden">
                                    <a href="{{route('post_show', ['id' => $cat->posts->last()->id, 'slug' => $cat->posts->last()->slug])}}">
                                        {{$cat->posts->last()->title}}</a>
                                </div>
                                <div>
                                    Author: <a
                                        href="{{route('user_show', ['name' => \App\Models\User::where(['id' => $cat->posts->last()->author_id])->first()->name])}}">{{\App\Models\User::where(['id' => $cat->posts->last()->author_id])->first()->name}}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="bg-gray-300 rounded p-2 space-y-4">
            <h2 class="text-2xl">Topics</h2>
            @foreach($category->posts as $post)
                <div class="bg-gray-400 border-gray-500 rounded text-white p-4 flex">
                    <div class="flex-1 w-1/2">
                        <h1 class="text-2xl"><a
                                href="{{route('post_show', ['id' => $post->id, 'slug' => $post->slug])}}">
                                {{$post->title}}
                            </a></h1>
                        <p>Topic author:
                            <a href="{{route('user_show', ['name' => \App\Models\User::where(['id' => $post->author_id])->first()->name])}}">{{\App\Models\User::where(['id' => $post->author_id])->first()->name}}</a>
                        </p>
                    </div>
                    <div class="flex w-1/2 -space-x-6 mt-2 flex-col md:flex-row items-center">
                        <div class="flex flex-col text-center w-1/3">
                            <b class="text-2xl">{{$post->replies_count}}</b>
                            <p class="text-sm">Posts</p>
                        </div>
                        <div class="hidden md:flex w-full md:w-1/2 flex-col text-right">
                            <div class="text-xl">
                                <a href="{{route('user_show', ['name' => \App\Models\User::where(['id' => $post->replies->last()->author_id])->first()->name])}}">
                                    {{\App\Models\User::where(['id' => $post->replies->last()->author_id])->first()->name}}
                                    {{\Carbon\Carbon::parse($post->replies->last()->created_at)->diffForHumans()}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
