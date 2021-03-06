@extends('layouts.app')

@section('content')
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h4 class="mt-4 text-center text-2xl font-extrabold text-gray-700">mForum</h4>
                <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900">Register</h2>
            </div>
            <form class="mt-8 space-y-6" action="{{route('register')}}" method="POST">
                    @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" type="text"
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('name') border-red-500 @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
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
                               name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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
                               name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
                        {{__('Register')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
