@extends("layouts.app")

@section('content')
<h1>List of Tasks</h1>
<div>
    @foreach ($tasks as $task)
    <p>{{$task-> title}}</p>
    @endforeach

</div>


@endsection
