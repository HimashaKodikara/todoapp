@exends("layouts.defaults")

@section("content")
<div class="card shadow-sm"  style="max-width: 500px">
    <form class="p-3" method="POST" action="">
        <div class="card shadow-sm"  style="max-width: 500px">

            <input type="text" name="title" class="form-control">
          </div>
          <div>
            <input type="datetime-local" name="deadline" class="form-control" name="deadline">
          </div>
          <div class="mb-3">

            <textarea class="form-control" rows="3" name="description"></textarea>
          </div>
          <button type="submit">Submit</button>
    </form>

</div>
@endsection
