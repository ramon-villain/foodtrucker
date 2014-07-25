<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$data['title'] or 'Home'}} | Foodtrucker.com.br</title>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	{{HTML::style('css/grid.css?ver=1')}}
	{{HTML::style('css/style.css?ver=1')}}
	@yield('css')
</head>
<body>
<div class="page">
	<div class="container">
		<header>
			<div id="logo" class="col-3"><a href="/"><img src="/images/foodtrucker-t.svg" alt="" height="100"/></a></div>
			<div id="menu" class="col-12">@include('front._includes.menu')</div>
			<div class="col-5">@include('front._includes.busca')</div>
		</header>
		<div id="content">
			@yield('content')
		</div>
	</div>
</div>
{{HTML::script('js/jquery.min.js')}}
{{HTML::script('js/jquery.cookie.min.js')}}
{{HTML::script('js/main.js')}}
@yield('scripts')
</body>
</html>