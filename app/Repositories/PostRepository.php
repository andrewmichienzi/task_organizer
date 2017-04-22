<?php

namespace App\Respositories;

use App\Post;

class PostRepository
{
  
  public function all()
  {
    return Post::all();
  }
}