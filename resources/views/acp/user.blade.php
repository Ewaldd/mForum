@extends('acp.layout')
@section('content')
    <div class="container mt-12 p-4">
        <div class="flex gap-4">
            <div
                class="ml-5 w-72 h-56 bg-gray-300 flex rounded text-center flex-wrap mx-4 overflow-hidden divide-y divide-gray-800">
                <div class="my-auto px-4 w-full overflow-hidden justify-center align-middle">
                    <p class="text-center text-4xl">{{$user->name}}</p>
                </div>
                <div class="flex my-auto px-4 w-full overflow-hidden">
                    <div class="flex flex-col text-center w-1/2">
                        <b class="text-2xl">{{sizeof($user->posts)}}</b>
                        <p class="text-sm">Posts</p>
                    </div>
                    <div class="flex flex-col text-center w-1/2">
                        <b class="text-2xl">{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</b>
                        <p class="text-sm">Account Created</p>
                    </div>
                </div>
            </div>
            <div class="h-56 bg-gray-300 rounded flex text-center flex-wrap mx-4 p-4">
                <div class="bg-white shadow-md rounded">
                    <h2 class="text-xl">Information</h2>
                    <form action="{{route('acp_change_user_information', ['name' => $user->name])}}" method="POST">
                        @csrf
                        <table class="w-full">
                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap font-bold">Name</th>
                                <td class="px-6 py-4"><input required minlength="3" type="text" class="border border-green-500 rounded"
                                                             name="newName" id="newName" value="{{$user->name}}"></td>
                            </tr>
                        </table>
                        <button type="submit"
                                class="p-2 justify-center rounded text-green-500 bg-transparent border border-green-500 hover:text-white hover:bg-green-500">
                            Save
                        </button>
                    </form>
                </div>
            </div>
            <div class="h-56 bg-gray-300 border shadow-red-500 shadow-md border-red-700 rounded flex text-center flex-wrap mx-4 p-8">
                <div class="bg-white shadow-md rounded p-8">
                    <h2 class="text-xl">Punishments</h2>
                   <div class="flex flex-col">
                       <a href="{{route('acp_warn_user', ['name' => $user->name])}}" class="text-sky-700 underline text-2xl">Warn {{$user->name}}</a>
                       <a href="{{route('acp_ban_user', ['name' => $user->name])}}" class="text-sky-700 underline text-2xl">Ban {{$user->name}}</a>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
