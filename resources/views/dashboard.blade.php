@extends("layouts.app")

@section('content')


<div >
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

    <div class="p-3 rounded shadow-sm max-width-100 max bg-body">
        <h1 >List of Tasks</h1>
        <h6 class="pb-2 mb-0 border-bottom">Recent updates</h6>

        </div>

        <small class="mt-3 d-block text-end">
          <a href="#">All updates</a>
        </small>
      </div>
   <table id="myTable">
    <thead>
        <th>Index</th>
        <th>Title</th>
        <th>Deadline</th>
        <th>Description</th>
        <th>Status</th>

    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->title}}</td>
            <td>{{$task->deadline}}</td>
            <td>{{$task->description}}</td>
            <td><a href="{{route('tasks.status.updated',$task->id)}}">completed</a></td>

        </tr>

        @endforeach
    </tbody>

   </table>



      >
</div>


@endsection
