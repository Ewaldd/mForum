@extends('layouts.app')
@section('content')
    <div class="container mx-auto bg-gray-200 rounded text-gray-800 p-4 flex flex-col space-y-4">
        @foreach($cats as $cat)
            <div class="bg-gray-400 border-gray-500 rounded text-white p-4 flex items-center">
                <div class="flex-1 w-1/2">
                    <h1 class="text-4xl"><a
                            href="{{route('category_show', ['id' => $cat->id, 'slug' => $cat->slug])}}">
                            {{$cat->name}}
                        </a></h1>
                    @if($cat->sub_categories->count() >0)
                        <p class="text-sm ml-4">
                            Subcategories:
                            @foreach($cat->sub_categories as $sub)
                                <a href="{{route('category_show', ['id' => $sub->id, 'slug' =>$sub->slug])}}"> {{$sub->name}}</a>
                            @endforeach
                        </p>
                    @endif
                </div>
                <div class="flex w-1/2 -space-x-6 mt-2 flex-col md:flex-row">
                    <div class="flex flex-col text-center w-1/3">
                        <b class="text-2xl">{{$cat->posts_count}}</b>
                        <p class="text-sm">Posts</p>
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
@endsection
