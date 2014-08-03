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
			<div class="col-5">@include('front._includes.busca',['formClass' => ''])</div>
		</header>
		<div id="content">
			@yield('content')
		</div>
	</div>
</div>
<footer>
	<div class="page">
		<div class="container">
			<div class="col-5 copyright">
				<img src="/images/foodtrucker-bye.png" alt=""/>
				<p>2014 © {{link_to_route('home', 'FOODTRUCKER.COM.br')}}<br/>
				TODOS OS DIREITOS RESERVADOS</p>
			</div>
			<div class="col-3 sitemap">
				<ul>
					<h3>MAPA DO SITE</h3>
					<li>{{link_to_route('home', '- HOME')}}</li>
					<li>{{link_to_route('sobre_path', '- SOBRE NÓS')}}</li>
					<li>{{link_to_route('home', '- TRUCKS')}}</li>
					<li>{{link_to_route('eventos_path', '- EVENTOS')}}</li>
					<li>{{link_to_route('home', '- BLOG')}}</li>
					<li>{{link_to_route('contato_path', '- CONTATO')}}</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<input id="current_url" name="current_url" value="{{URL::current()}}" type="hidden"/>
{{HTML::script('js/jquery.min.js')}}
{{HTML::script('js/jquery.cookie.min.js')}}
{{HTML::script('js/main.js')}}
@yield('scripts')
</body>
</html>