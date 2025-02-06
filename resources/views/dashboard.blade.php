@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="p-3 rounded shadow-sm bg-body">
            <h1>List of Tasks</h1>
            <h6 class="pb-2 mb-0 border-bottom">Recent Updates</h6>
        </div>

        <small class="mt-3 d-block text-end">
            <a href="#">All updates</a>
        </small>

        <table id="myTable" class="table mt-3 table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Index</th>
                    <th>Title</th>
                    <th>Deadline</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th></th>
                    <th>Status
                        <select id="statusFilter" class="w-auto form-select form-select-sm d-inline-block ">
                            <option value="all">All</option>
                            <option value="complete"> Complete</option>
                            <option value="in-progress">In Progress</option>
                        </select>
                    </th>
                    <th>Actions</th>
                </tr>
            </thead <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') }}</td>
                    <td>{{ $task->description }}</td>
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                      </svg></td>
                    <td class="text-center">
                        @if ($task->status == 'complete')
                            <span class=" btn btn-secondary" >  Done </span>
                        @else
                            <a href="{{ route('tasks.status.updated', $task->id) }}" class="btn btn-success">Complete</a>
                        @endif

                    </td>
                    <td class="text-center">
                        @if ($task->status == 'complete')
                            <span class="btn btn-outline-success">Completed</span>
                        @else
                            <span class="btn btn-outline-warning">In Progress</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        documnet.getElementById("statusFilter").addEventListner("change", function() {
            let selectedStatus = this.value;
            let rows = document.queryselectorAll(".task-row");

            row.forEach(row => {
                let status = row.getAttribute("data-status");

                if (selectedStatus === "all" ||
                    (selectedStatus === "complete" && status === "complete") ||
                    (selectedStatus === "in-progress" && status != "complete")) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
@endsection
