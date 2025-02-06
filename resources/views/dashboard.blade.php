@extends("layouts.app")

@section('content')
<div class="container mt-4">
    @if(session()->has("success"))
        <div class="alert alert-success">
            {{ session()->get("success") }}
        </div>
    @endif

    @if(session("error"))
        <div class="alert alert-danger">
            {{ session("error") }}
        </div>
    @endif

    <div class="p-3 rounded shadow-sm bg-body">
        <h1>List of Tasks</h1>
        <h6 class="pb-2 mb-0 border-bottom">Recent Updates</h6>
    </div>

    <small class="mt-3 d-block text-end">
        <a href="#">All updates</a>
    </small>

    <table id="myTable" class="table table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Index</th>
                <th>Title</th>
                <th>Deadline</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') }}</td>
                    <td>{{ $task->description }}</td>
                    <td class="text-center">
                        <a href="{{ route('tasks.status.updated', $task->id) }}" class="btn btn-success">Completed</a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
