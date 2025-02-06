@extends("layouts.app")

@section("content")
<div class="p-3 mx-auto sh-adow-sm card" style="max-width: 500px">
    <div class="text-center fs-3 fw-bold">Add New Task</div>
    <form method="POST" action="">
        @csrf

        <div class="mb-3">
            <input type="text" name="title" class="form-control " placeholder="Task Title" required>
        </div>
        <div class="mb-3">
            <input type="datetime-local" name="deadline" class="form-control" required>
        </div>
        <div class="mb-3">
            <textarea class="form-control" rows="3" name="description" placeholder="Task Description"></textarea>
        </div>
        <button type="submit" class="btn btn-success w-100">Submit</button>
    </form>
</div>
@endsection
