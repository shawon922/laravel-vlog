<div class="col-sm-3 offset-sm-1 blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">

    <h3>Total Hits: {{ $visitors }}</h3>
    <h4>About</h4>
    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
  </div>
  <div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">
        @foreach ($archives as $archive)
            <li><a href="{{ route('post-list') }}?month={{ $archive['month'] }}&year={{ $archive['year'] }}">{{ $archive['month'] .' '. $archive['year'] }} </a> {{ ' ('. $archive['published'] .')' }} </li>
        @endforeach
    </ol>
  </div>

  <div class="sidebar-module">
    <h4>Tags</h4>
    <ol class="list-unstyled">
        @foreach ($tags as $tag)
            <li><a href="{{ route('posts-by-tags', $tag) }}"> {{ $tag }} </a> </li>
        @endforeach
    </ol>
  </div>

  <div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
      <li><a href="#">GitHub</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">Facebook</a></li>
    </ol>
  </div>
</div><!-- /.blog-sidebar -->