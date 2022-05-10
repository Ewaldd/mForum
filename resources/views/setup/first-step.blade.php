@extends('layouts.app')
@section('content')
    <div class="container mx-auto bg-gray-300 rounded text-gray-800 text-center flex justify-center items-center p-4">
        <div class="w-1/2 items-center ">
            <p class="text-4xl mb-4">1. Choose Forum name</p>
            <hr>
            <form action="{{route('setupFirstStepCreate')}}" method="post">
                @csrf
                <label for="forum_name" class="sr-only">Forum name</label>
                <input type="text" id="forum_name" name="forum_name"
                       class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                       placeholder="Forum name" required>
                <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent mt-4 text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Next
                </button>
            </form>
        </div>
    </div>
@endsection
