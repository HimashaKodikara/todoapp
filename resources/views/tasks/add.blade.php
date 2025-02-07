@extends('layouts.app')

@section('content')
    <div class="p-3 mx-auto sh-adow-sm card" style="max-width: 500px">
        <div class="text-center fs-3 fw-bold">Add New Task</div>
        <form method="POST" action={{ route('tasks.store') }}>
            @csrf

            <div class="mb-3">
                <input type="text" name="title" class="form-control " placeholder="Task Title" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="datetime-local" name="deadline" class="form-control">
                @error('deadline')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <textarea class="form-control" rows="3" name="description" placeholder="Task Description"></textarea>
                @error('deadline')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-success w-100">Submit</a></button>


        </form>

    </div>
@endsection
