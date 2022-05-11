@extends('layouts.app')
@section('content')
    <div class="container mx-auto bg-gray-300 rounded text-gray-800 text-center flex justify-center items-center p-4">
        <div class="w-1/2 items-center ">
            <p class="text-4xl mb-4">3. Create First Category</p>
            <hr>
            <form class="mt-8 space-y-6" action="{{route('setupThirdStepCreate')}}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm space-y-2">
                    <div>
                        <label for="name" class="sr-only">Category name</label>
                        <input id="name" type="text"
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('name') border-red-500 @enderror"
                               name="category_name" value="{{ old('category_name') }}" required
                               placeholder="Category name">
                        @error('category_name')
                        <span class="text-red-500">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Next
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

