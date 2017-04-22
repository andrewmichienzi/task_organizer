<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\User;
use \App\Post;

class ExampleTest extends TestCase
{
  use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
      // Given I have two records of two different months
    
      $first = factory(Post::class)->create();
      $second = factory(Post::class)->create([
          'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);
      
      // When I fetch the archive
      $posts = Post::archives();
      
      // Then the response should be in the proper format
      
      $this->assertEquals([
          [
            "year" => $first->created_at->format('Y'), //format('Y') gives year
            "month" => $first->created_at->format('F'), //format('F') gives month
            "published" => 1
          ],
          [
            "year" => $second->created_at->format('Y'),
            "month" => $second->created_at->format('F'),
            "published" => 1
          ]
        ], $posts);
    }
}
