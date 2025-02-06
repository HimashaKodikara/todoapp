@extends("layouts.app")

@section('content')
<h1>List of Tasks</h1>
<div>
    @if(session()->has("success"))
    <div class="alert-success">
        {{session()->get("success")}}
    </div>
    @endif
    @if (session("error"))
    <div class="alert alert-danger">
        {{session("error")}}
    </div>

    @endif

    @foreach ($tasks as $task)
    {{$task}}
    @endforeach

</div>


@endsection
