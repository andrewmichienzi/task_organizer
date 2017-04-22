@extends ('layouts.master')

@section('content')

<form method="POST" action="/posts">
  {{ csrf_field() }}
  
  <div class="form-group">
    <label for="title">Title</label>
    <input type="title" name="title" class="form-control" id="title" required>
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <input type="text" id="body" name="body" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-default">Publish</button>
  @include('layouts.errors')

</form>


@endsection