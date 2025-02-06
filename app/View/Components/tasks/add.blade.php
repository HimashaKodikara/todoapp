@exends("layouts.app")

@section("content")
<div class="shadow-sm card"  style="max-width: 500px">
    <div class="text-center fs-3 fw-bold">Add New Task</div>
    <form class="p-3" method="POST" action="">
        <div class="shadow-sm card"  style="max-width: 500px">

            <input type="text" name="title" class="form-control">
          </div>
          <div>
            <input type="datetime-local" name="deadline" class="form-control" name="deadline">
          </div>
          <div class="mb-3">

            <textarea class="form-control" rows="3" name="description"></textarea>
          </div>
          <button type="submit" style="btn btn-success">Submit</button>
    </form>

</div>
@endsection
