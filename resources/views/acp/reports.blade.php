@extends('acp.layout')
@section('content')
    <div class="container mx-auto mt-4">
        <div class="open">
            <h2 class="text-center text-4xl mb-2 text-white">Open</h2>
            <table class="w-full text-center text-white">
                <thead class="text-gray-300 uppercase">
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
                            <a href="{{route('post_show', ['id' => $report->post->id, 'slug' => $report->post->slug])}}"
                               class="text-sky-300 underline">Click
                                Here to view reported post</a></td>
                        <td class="px-6 py-4">{{$report->reason}}</td>
                        <td class="px-6 py-4">
                            <a href="{{route('user_show', ['name' => $report->reporter->name])}}">{{$report->reporter->name}}</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('user_show', ['name' => $report->reported->name])}}">{{$report->reported->name}}</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('acp_report', ['id' => $report->id])}}"
                               class="p-2 flex justify-center rounded text-sky-300 bg-transparent border border-sky-300 hover:text-white hover:bg-sky-300">
                                Click Here
                            </a>
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
                            <a href="{{route('post_show', ['id' => $report->post->id, 'slug' => $report->post->slug])}}"
                               class="text-sky-300 underline">Click
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
