@extends('layouts.app')
@section('content')
    <div class="container mx-auto bg-gray-200 rounded text-gray-800 p-4 flex flex-col space-y-4"
         x-data="{'showReportModal': false}">
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
                <div class="content mt-4 border-b-2 border-b-gray-700">
                    <p>
                        {{$post->content}}
                    </p>
                </div>
                @auth
                    <div class="buttons text-right mt-2">
                        @if(auth()->user()->id != $post->author_id)
                            <button type="button"
                                    class="bg-red-500 border border-red-500 hover:border-red-700 text-white hover:text-gray-300 font-bold py-2 px-4 rounded-full"
                                    @click="showReportModal = true">Report
                            </button>
                        @endif
                    </div>
                @endauth
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
                            <textarea id="post" cols="250" rows="5" required name="post"
                                      class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full h-full text-black resize-none sm:text-sm border border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>
                    @error('post')
                    <span class="text-red-500">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="px-4 py-4 text-center sm:px-6 ">
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add reply
                        </button>
                    </div>
                </form>
            </div>
        @endauth
        <div x-show="showReportModal"
             class="absolute container mx-auto bg-gray-200 rounded text-center text-gray-800 p-4 flex flex-col space-y-4 fade-in "  @click.away="showReportModal = false" x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-300"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-90">
            <h2 class="text-4xl">Report post #{{$post->id}}</h2>
            <form action="{{route('report_add', ['id' => $post->id])}}" method="post" class="p-3 flex flex-col space-y-4">
                @csrf
                <div  class="p-3">
                    <label for="reason" class="sr-only">Reason</label>
                    <textarea name="reason" id="reason" required cols="30" rows="10" class="form-control w-full border rounded-lg border-gray-500" placeholder="Reason.."></textarea>
                    @error('reason')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-red-500 border border-red-500 hover:border-red-700 text-white hover:text-gray-300 font-bold py-2 px-4 rounded-full">
                        Report
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
