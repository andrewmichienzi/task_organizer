@extends ('layouts.master');

@section('content')
  
  <div class="col-sm-8 blog-main">
        
      <div class="blog-post">
      <h2 class="blog-post-title">
        {{ $post->title }}
      </h2>
      
    
      {{ $post->body }}
      
      <hr>
      
      <div class="comments">
        <ul class="list-group">
          @foreach ($post->comments as $comment)
            <li class="list-group-item">
              <strong>
                {{ $comment->created_at->diffForHumans() }}
                </strong><weak>&nbsp by &nbsp</weak><strong>{{ $comment->user->name }}: &nbsp
              </strong>
              
              {{ $comment->body }}
            </li>
          @endforeach
        </ul>
      </div>
      
      <div class="card">
        <div class="card-block">
          <form method="POST" action="/posts/{{ $post->id }}/comments/">
            {{ csrf_field() }}
            <div class="form-group">
              <textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-default">Add Comment</button>
            </div>
            
            @include('layouts.errors')
          </form>
        </div>
      </div>
    
    </div><!-- /.blog-post -->
  </div>
@endsection