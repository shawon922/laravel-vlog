@extends('layouts.blog')

@section('title')
	{{ $title }}
@endsection


@section('content')
	<div class="pull-right">
		<a class="btn btn-primary" href="{{ route('post-create') }}">Create Post</a>
	</div>
	
	@foreach ($posts as $post)
		<div class="blog-post">
	        <h2 class="blog-post-title">
	        	<a href="{{ route('post-details', $post->id) }}">
	        		{{ $post->title }}
	        	</a>
	        </h2>
	        <p class="blog-post-meta"> {{ $post->created_at->toFormattedDateString() }} by {{ $post->user->name }}</p>

	        <p> {{ $post->body }} </p>
	    </div>
	    <hr />
	@endforeach
	<nav class="blog-pagination">
		<a class="btn btn-outline-primary" href="#">Older</a>
		<a class="btn btn-outline-secondary disabled" href="#">Newer</a>
	</nav>
@endsection
