@extends('layouts.master')

@section('content')
  <div class='col-sm-8'>
    <h1>Sign in</h1>
    
    <form method="POST" action="/login">
      {{ csrf_field() }}
      
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" class="form-control" name="email" required>
      </div>
      
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" class="form-control" name="password" required>
      </div>
      
      <div class="form-group">
        <button type="submit" class="btn btn-default">Sign in</button>
      </div>
      
      @include('layouts.errors')
      
    </form>
  </div>
@endsection