<?php

namespace App\Http\Controllers;

use \App\Post;

use Carbon\Carbon;

use Illuminate\Http\Request;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except(['index', 'show']);
  }
  
  public function index() //Controller Action
  {
    $posts = Post::latest()
    ->filter(request(['month', 'year']))
    ->get();
    
    return view('posts.index', compact('posts'));
  }
  
  public function create()
  {
    return view('posts.create');
  }
  
  public function show(Post $post)
  {
    return view('/posts/show', compact('post'));
  }
  
  public function store()
  {
    /*
    // Create a new post using the request data
    $post = new Post;
    
    $post->title = request('title');
    $post->body = request('body');
    
    // Save it to the database
    $post->save();
    //Redirect to the home page
    */
    
    $this->validate(request(), [
        
      'title' => 'required',
      'body' => 'required'
        
    ]);
    
    auth()->user()->publish(
      new Post(request(['title', 'body']))
    );
    
    return redirect('/');
    
  }
}
/*

posts

GET /posts

GET /posts/create

POST /posts

GET /posts/{id}/edit

GET /posts/{id}

PATCH /posts/{id}

DELETE /posts/{id}

*/