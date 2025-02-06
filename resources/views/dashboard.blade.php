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

    <div class="p-3 my-3 rounded shadow-sm bg-body">
        <h6 class="pb-2 mb-0 border-bottom">Recent updates</h6>
        <div class="pt-3 d-flex text-body-secondary">
          <svg class="flex-shrink-0 rounded bd-placeholder-img me-2" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
          <p class="pb-3 mb-0 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark">@username</strong>
            Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
          </p>
        </div>

        <small class="mt-3 d-block text-end">
          <a href="#">All updates</a>
        </small>
      </div>


</div>


@endsection
