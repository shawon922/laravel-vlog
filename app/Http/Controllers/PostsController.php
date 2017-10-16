<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\PostPublishedEvent;

use Illuminate\Support\Facades\Redis;

use App\Post;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index()
    {
    	$title = 'Post List';

        $posts = Post::published()
                    ->filter(request(['month', 'year']))
                    ->latest()
                    ->get();

        //dd($posts);

    	return view('posts.index', compact('title', 'posts'));
    }

    public function show(Post $post)
    {
        $title = $post->title;

        //$post = Post::find($id);

    	return view('posts.show', compact('title', 'post'));
    }

    public function create()
    {
    	$title = 'Create Post';

    	return view('posts.create', compact('title'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'is_published' => 'required|numeric'
        ]);

        $post = auth()->user()->createPost(
                    new Post(request(['title', 'body', 'is_published']))
                );

        if ($post->is_published == 1) {
            
            //dd($post);

            event(new PostPublishedEvent($post, $post->user));
        }        

    	//dd(request()->all());
        /*$post = new Post;

        $post->title = request('title');
        $post->body = request('body');
        $post->is_published = request('is_published');

        $post->save();*/

/*        Post::create([
            'title' => request('title'), 
            'body' => request('body'), 
            'is_published' => request('is_published'),
            'user_id' => auth()->user()->id
        ]);*/

        return redirect('/');
    }

}
