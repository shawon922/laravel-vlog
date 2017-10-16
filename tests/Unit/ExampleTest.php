<?php

namespace Tests\Unit;

use App\Post;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
	use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
    	$first = factory(Post::class)->create();

    	$second = factory(Post::class)->create([
    		'created_at' => \Carbon\Carbon::now()->subMonth()
    	]);

    	$posts = Post::archives();

    	//dd($posts);

    	//$this->assertCount(2, $posts);
    	$this->assertEquals([
    		[
    			"year" => $first->created_at->year,
			    "month" => $first->created_at->format('F'),
			    "published" => 1

    		],
    		[
    			"year" => $second->created_at->year,
			    "month" => $second->created_at->format('F'),
			    "published" => 1

    		]
    	], $posts);
    }
}
