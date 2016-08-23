<html>
<head>
	<title>Laravel</title>

	<link rel="stylesheet" href="{{asset('/css/materialize.min.css')}}">
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/masonry-docs.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/normalize.css" rel="stylesheet">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	@section('css')

		@show
</head>
<body>
	@section('header')
	@include('layouts.header')
		@show

	<div class="container">
		@yield('content')
	</div>
	<script src="{{asset('/js/jquery-3.1.0.min.js')}}"></script>
	<script src="{{asset('/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('/js/materialize.min.js')}}"></script>
	<script type="text/javascript">
		(function($){
			$(function(){

				$('.button-collapse').sideNav();

}); // end of document ready
})(jQuery); // end of jQuery name space
</script>

@section('js')

@show
</body>
</html>