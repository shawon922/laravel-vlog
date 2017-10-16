@extends('layouts.blog')

@section('title')
	{{ $title }}
@endsection


@section('content')

	<div class="blog-post">
        <h2 class="blog-post-title">
        	<a href="{{ route('post-details', $post->id) }}">
        		{{ $post->title }}
        	</a>
        </h2>

        @if (count($post->tags))
            <ul>
                @foreach ($post->tags as $tag)
                    <li>
                        <a href="{{ route('posts-by-tags', $tag->name) }}"> {{ $tag->name }} </a>
                    </li>
                @endforeach
            </ul>
        @endif
        <p class="blog-post-meta"> {{ $post->created_at->toFormattedDateString() }} by {{ $post->user->name }}</p>

        <p> {{ $post->body }} </p>

        <hr />
        <div class="row">
        	<p class="lead">
        		Comments
        	</p>

        	<form method="POST" action="{{ route('comment-store', $post->id) }}">
        		@include('layouts.errors')

        		{{ csrf_field() }}

        		<div class="form-group">
        			<textarea name="body" class="form-control" id="body" placeholder="Your comment here..." rows="3">@if (old('body')){{ old('body') }}@endif</textarea>
        		</div>

        		<div class="form-group">
        			<button type="submit" class="btn btn-primary">Add Comment</button>
        		</div>
        	</form>
        	<hr />

	        @foreach ($post->comments as $comment)
		        <blockquote>
		            <p>{{ $comment->body }}</p>
		            <footer>
		                by {{ $comment->user->name }} | {{ $comment->created_at->diffForHumans() }}
		            </footer>
		        </blockquote>
	        @endforeach
        </div>
        
    </div>

@endsection
