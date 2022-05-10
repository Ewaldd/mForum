@extends('layouts.app')
@section('content')
    <div class="container mx-auto bg-gray-300 rounded text-gray-800 text-center flex justify-center items-center p-4">
        <div class="w-1/2 items-center ">
            <p class="text-4xl mb-4">2. Create Admin Account</p>
            <hr>
            <form class="mt-8 space-y-6" action="{{route('setupSecondStepCreate')}}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm space-y-2">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" type="text"
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('name') border-red-500 @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                               placeholder="Administrator">
                        @error('name')
                        <span class="text-red-500">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="sr-only">Email Address</label>
                        <input id="email" type="email"
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('email') border-red-500 @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email"
                               placeholder="Email">
                        @error('email')
                        <span class="text-red-500">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="@error('password') border-red-500 @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Password">
                        @error('password')
                        <span class="text-red-500">
                                <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirm" class="sr-only">Confirm Password</label>
                        <input id="password-confirm" type="password"
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               name="password_confirmation" required autocomplete="new-password"
                               placeholder="Confirm Password">
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Next
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
