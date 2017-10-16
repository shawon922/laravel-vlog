<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="author" content="">
    <link rel="icon" href="public/favicon.ico">

    <title>
    	@yield('title')
    </title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('public/css/blog.css') }}" rel="stylesheet">
  </head>

  <body>

  	@include('includes.header')

    <div class="container">

      	<div class="row">

        	<div class="col-sm-8 blog-main">

        		@yield('content')


	        </div><!-- /.blog-main -->

	        @include('includes.sidebar')

    	</div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="https://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/js/blog/popper.min.js') }}"></script>
    <script src="{{ asset('public/css/bootstrap/js/bootstrap.min.js') }}"></script>
    
  </body>
</html>
