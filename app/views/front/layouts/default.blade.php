<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="google-site-verification" content="p0Q1c2z9-4NjDk5WBlVKVLy9271l3J8UxF3kCCeVubI" />
	<meta name="description" content="FoodTrucker.com.br - Localizações, informações e novidades dos Food Trucks e da comida de rua.">
	<meta name="keywords" content="foodtruck, food truck, foodtrucker, food trucker, comida de rua, caminhão de comida, buzina, los mendozitos, kombier, la buena station, massa na caveira, holy pasta, 13 truck, 4 brothers, anacravo, bio barista, the asian father, la peruana, salve salve, box da fruta, aleatorium, thata burger, fichips, ned crepes, temaki point, candy crush ice cream, me gusta picolés">
	<meta name="application-name" content="FoodTrucker.com.br">
	<meta name="application-name" content="{{url()}}">
	<meta property="og:title" content="FoodTrucker.com.br | Seu guia de informação e localização de Food Truck e comida de rua">
	<meta property="og:type" content="website">
	<meta property="og:url" content="http://www.foodtrucker.com.br">
	<meta property="og:image" content="{{url()}}/images/food_face.png">
	<meta property="og:site_name" content="FoodTrucker.com.br">
	<meta property="og:description" content="FoodTrucker.com.br - Localizações, informações e novidades dos Food Trucks e da comida de rua.">
	<meta property="fb:page_id" content="258568904329356">
	@if (Request::path() == '/')
		<title>FoodTrucker.com.br | Seu guia de informação e localização de Food Truck e comida de rua!</title>
	@else
		<title>{{$data['title'] or 'Home'}} | FoodTrucker.com.br</title>
	@endif
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon"
	      type="image/png"
	      href="/images/favicon.png">
	{{HTML::style('css/grid.css?ver=3')}}
	{{HTML::style('css/style.css?ver=3')}}
	@yield('css')
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-51845302-1', 'auto');
		ga('send', 'pageview');

	</script>
</head>
<body>
<div class="page">
	<div class="container">
		<header>
			<div class="social_menu" style="float: none;clear: both;display: block;text-align: right;margin-bottom: -26px;padding-right: 10px;position: relative;top:32px;z-index:10;">
				<a href="http://fb.com/foodtruckerbr" target="_blank" style="margin-right: 3px;"><i class="fa fa-2x fa-facebook-square" style="color:#666"></i></a>
				<a href="http://instagram.com/foodtruckerbr" target="_blank"><i class="fa fa-2x fa-instagram" style="color:#666"></i></a>
			</div>
			<div id="logo" class="col-3"><a href="{{route('home')}}"><img src="/images/foodtrucker-t.svg" alt="" height="100"/></a></div>
			<div id="menu" class="col-12">@include('front._includes.menu')</div>
			<div class="col-5" style="position: relative;z-index:1;">@include('front._includes.busca',['formClass' => ''])</div>
		</header>
		<div id="content">
			@if ($message != '')
			<script>alert('{{$message}}')</script>
			@endif
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
					<li>{{link_to_route('trucks_path', '- TRUCKS')}}</li>
					<li>{{link_to_route('eventos_path', '- EVENTOS')}}</li>
					<li>{{link_to_route('home', '- BLOG')}}</li>
					<li>{{link_to_route('contato_path', '- CONTATO')}}</li>
				</ul>
			</div>
			<div class="col-5">
				<div class="instagram">
					<img src="http://photos-b.ak.instagram.com/hphotos-ak-xfa1/10570028_266206153586657_1672308579_n.jpg" alt=""/>
					<span><a href="http://instagram.com/foodtruckerbr"><i class="fa fa-instagram"></i>@FOODTRUCKER</a></span>
				</div>
			</div>
			<div class="col-7 right">
				{{ Form::open(['route' => 'newsletter_path', 'class' => 'form form_footer']) }}
					<p>Cadastre-se em nossa newsletter</p>
					<div class="wrapInput">{{ Form::email('email', '', ['placeholder' => 'email@exemplo.com', 'required' => 'required']) }}</div>
					{{ Form::submit('OK', ['class' => 'text-btn']) }}
				{{ Form::close() }}
				<p>Entre em contato:</p>
				<div class="talk">
					<a href="mailto:carona@foodtrucker.com.br?Subject=[Foodtrucker] Contato"><i class="fa fa-envelope-o" style="margin-right: 8px;"></i>carona@foodtrucker.com.br</a>
					<a href="http://fb.com/foodtruckerbr"><i class="fa fa-facebook-square"></i>FB.COM/Foodtruckerbr</a>
					<a href="http://instagram.com/foodtruckerbr"><i class="fa fa-instagram"></i>@Foodtruckerbr</a>
				</div>
			</div>
		</div>
	</div>
</footer>
<input id="current_url" name="current_url" value="{{URL::current()}}" type="hidden"/>
{{HTML::script('js/jquery.min.js')}}
{{HTML::script('js/min/jquery-ui.min-min.js')}}
{{HTML::script('js/main.js')}}
@yield('scripts')
</body>
</html>