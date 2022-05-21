@extends('acp.layout')
@section('content')
    <div class="container mx-auto mt-4 text-white p-4" x-data="{'goodReason': false, 'badReason': false}">
        <h2 class="text-center text-4xl">Report #{{$report->id}}</h2>
        <p>
            <a href="{{route('acp_user', ['name' => $report->reporter->name])}}"
               class="text-sky-300 text-xl">Reporter: {{$report->reporter->name}}</a>
            <a href="{{route('acp_user', ['name' => $report->reported->name])}}"
               class="text-sky-300 text-xl">Reported: {{$report->reported->name}}</a>
        </p>
        <div>
            Report reason:
            <p>{{$report->reason}}</p>
            <a class="text-sky-300"
               href="{{route('post_show', ['id' => $report->post->id, 'slug' => $report->post->slug])}}">Click here to
                view reported post</a>
        </div>
        <div class="border border-sky-300 p-4">
            <h2 class="text-center text-2xl">What is your decision?</h2>
            <button @click="goodReason = !goodReason" class="p-2 justify-center rounded text-green-500 bg-transparent border border-green-500 hover:text-white hover:bg-green-500">
                Good Report
            </button>
            <form action="{{route('acp_set_result', ['id' =>$report->id])}}" method="post">
                @csrf
                <button type="submit"
                        class="p-2 justify-center rounded text-red-500 bg-transparent border border-red-500 hover:text-white hover:bg-red-500">
                    Bad Report
                </button>
            </form>
            <div x-show="goodReason" class="text-center">
                <p class="text-2xl">Choose punishment for {{$report->reported->name}}</p>
                <div class="p-1.5">
                    <form action="{{route('acp_set_result', ['id' => $report->id])}}" method="POST">
                        @csrf
                        <label>
                            <input type="radio" name="punishment">Warn
                        </label>
                        <label>
                            <input type="radio" name="punishment">Ban
                        </label>
                        <br>
                        <button type="submit"
                                class="p-2 justify-center rounded text-green-500 bg-transparent border border-green-500 hover:text-white hover:bg-green-500">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
