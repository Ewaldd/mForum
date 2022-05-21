@extends('acp.layout')
@section('content')
    <div class="container mx-auto mt-4">
        <table class="w-full text-white text-center">
            <thead class="text-gray-300 uppercase">
                <tr class="border">
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Account Created</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{$user->id}}</th>
                        <td class="px-6 py-4">{{$user->name}}</td>
                        <td class="px-6 py-4">{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                        <td class="px-6 py-4">
                            <a href="{{route('acp_user', ['name' => $user->name])}}" class="text-sky-300 underline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
