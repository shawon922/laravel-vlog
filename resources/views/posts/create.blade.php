@extends('layouts.blog')

@section('title')
	{{ $title }}
@endsection


@section('content')
	<h1>Create Blog Post</h1>
	<hr />
	<form method="post" action="{{ route('post-store') }}">

		@include('layouts.errors')
		
		{{ csrf_field() }}
		<div class="form-group">
			<label for="title">Title</label>
			<input name="title" type="text" class="form-control" id="title" placeholder="Post Title">
		</div>
		<div class="form-group">
			<label for="body">Body</label>
			<textarea name="body" class="form-control" id="body" placeholder="Post Body" rows="6"></textarea>
		</div>
		
		<div class="form-group">
			<label for="body">Status</label>
			<select name="is_published" class="form-control">
				<option value="0">Draft</option>
				<option value="1">Published</option>
			</select>
		</div>
		
		<div class="form-group">
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
		
	</form>
@endsection

