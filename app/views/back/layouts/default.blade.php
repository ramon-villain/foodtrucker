<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$data['title'] or 'Home'}} | Foodtrucker [ADMIN AREA]</title>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	{{HTML::style('css/admin.css?ver=1')}}
	@yield('css')
</head>
<body>
<aside>
	<div id="logo"><a href="/"><img src="/images/foodtrucker-t.svg" alt="" height="100"/></a></div>
	<div id="menu">@include('back._includes.menu')</div>
</aside>
<div class="page">
	<div class="container">
		<div id="content">
			@yield('content')
		</div>
	</div>
</div>
{{HTML::script('js/jquery.min.js')}}
{{HTML::script('js/jquery-ui.min.js')}}
{{HTML::script('js/jquery.cookie.min.js')}}
@yield('scripts')
{{HTML::script('js/main.js')}}
</body>
</html>