@extends('acp.layout')
@section('content')
    <div class="container mx-auto mt-4">
        <div class="open">
            <h2 class="text-center text-4xl mb-2 text-white">Open</h2>
            <table class="w-full text-center text-white">
                <thead class=" text-gray-300 uppercase">
                <tr class="border">
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">Post</th>
                    <th scope="col" class="px-6 py-3">Reason</th>
                    <th scope="col" class="px-6 py-3">Reporter</th>
                    <th scope="col" class="px-6 py-3">Reported</th>
                    <th scope="col" class="px-6 py-3">Result</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($open as $report)
                        <tr class="border">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{$report->id}}</th>
                            <td class="px-6 py-4">
                                <a href="{{route('post_show', ['id' => $report->post->id, 'slug' => $report->post->slug])}}" class="text-sky-300 underline">Click
                                    Here to view reported post</a></td>
                            <td class="px-6 py-4">{{$report->reason}}</td>
                            <td class="px-6 py-4">
                                <a href="{{route('user_show', ['name' => $report->reporter->name])}}">{{$report->reporter->name}}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{route('user_show', ['name' => $report->reported->name])}}">{{$report->reported->name}}</a>
                            </td>
                            <td class="px-6 py-4 grid grid-cols-2 gap-2">
                                <button class="p-2 flex justify-center rounded text-green-500 bg-transparent border border-green-500 hover:text-white hover:bg-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="p-2 flex justify-center rounded text-red-500 bg-transparent border border-red-500 hover:text-white hover:bg-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="closed mt-8">
            <h2 class="text-center text-4xl mb-2 text-white">Closed</h2>
            <table class="w-full text-center text-white">
                <thead class=" text-gray-300 uppercase">
                <tr class="border">
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">Post</th>
                    <th scope="col" class="px-6 py-3">Reason</th>
                    <th scope="col" class="px-6 py-3">Reporter</th>
                    <th scope="col" class="px-6 py-3">Reported</th>
                </tr>
                </thead>
                <tbody>
                @foreach($closed as $report)
                    <tr class="border">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{$report->id}}</th>
                        <td class="px-6 py-4">
                            <a href="{{route('post_show', ['id' => $report->post->id, 'slug' => $report->post->slug])}}" class="text-sky-300 underline">Click
                                Here to view reported post</a></td>
                        <td class="px-6 py-4">{{$report->reason}}</td>
                        <td class="px-6 py-4">
                            <a href="{{route('user_show', ['name' => $report->reporter->name])}}">{{$report->reporter->name}}</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('user_show', ['name' => $report->reported->name])}}">{{$report->reported->name}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
