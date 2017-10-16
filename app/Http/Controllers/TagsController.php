<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;


class TagsController extends Controller
{
    public function index(Tag $tag)
    {
    	$title = 'Post List';

        /*$posts = Post::published()
                    ->filter(request(['month', 'year']))
                    ->latest()
                    ->get();*/

        $posts = $tag->posts;

        //dd($posts);

    	return view('posts.index', compact('title', 'posts'));
    }
}
