@component('mail::message')
# New post has been published on Vlog

{{ $post->title }} by {{ $author->name }}

@component('mail::button', ['url' => $postUrl ])
Read Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
