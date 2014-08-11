@extends('front.layouts.default')
@section('content')
@include('front._includes.errors')
<div id="filter_map" class="col-20">
	<h2>TÔ COM FOME!</h2>
	{{Form::open()}}
	{{Form::text('filter_taste', '', ['placeholder' => 'O que você quer comer?', 'id' => 'filter_taste'])}}
	<div class="wrapInput" id="address">{{Form::text('filter_address', '', ['placeholder' => 'Onde você está?', 'id' => 'filter_address'])}}<span class="clean"><i class="fa fa-times-circle"></i></span></div>
	<input name="lat" type="hidden" class="geo" value="">
	<input name="lng" type="hidden" class="geo" value="">
	<select id="filter_categoria" class="form-control filter_select">
		<option value="0" selected>Categorias</option>
		@foreach ($categorias as $categoria)
		<option value="{{$categoria->id}}">{{$categoria->nome}}</option>
		@endforeach
	</select>
	<select id="filter_truck" class="form-control filter_select">
		<option value="0" selected>Food Trucks</option>
		@foreach ($trucks as $truck)
		<option value="{{$truck->id}}">{{$truck->nome}}</option>
		@endforeach
	</select>
	{{Form::close()}}
</div>
<div id="main" class="col-13">
	<div class="mapa_wrapper">
	<span class="mapa_fail">
		<img src="{{url()}}/images/no-results.png"/>
		<h1>:(</h1>
		<h1>Não encontramos nenhum truck.</h1>
		<h2>Tente novamente com novas opções!</h2>
	</span>
	</div>
	<div id="mapa"></div>
	<div id="truckDaSemana" class="col-5 alpha widget">
		<div class="title green"><i class="fa fa-trophy"></i><h2>{{$featured->title}}</h2></div>
		<div class="body" style="background-image: url({{$featured->image}})">
			<h3>{{$featured->body}}</h3>
		</div>
	</div>
	<div id="anota-ai" class="col-8 omega widget ">
		<div class="title green"><i class="fa fa-calendar-o"></i><h2>Anota Aí!</h2> <!--<span>Hoje</span>--></div>
		<div class="body carousel">
			<ul class="bjqs">
				@foreach ($banners as $banner)
				<li>
					<a href="{{$banner->url}}" target="_blank">
						<img src="{{$banner->imagem}}" alt=""/>
						<h3>{{$banner->body}}</h3>
					</a>
				</li>
				@endforeach
			</ul>
		</div>

	</div>
</div>
<div id="sidebar" class="col-7">
	@include('front._includes.next-spots-home')
	@include('front._includes.novo_truck')
</div>
<input name="" type="hidden" id="parent_url" value="{{route('home')}}"/>
@stop
@section('scripts')
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=pt-BR"></script>
{{HTML::script('js/tag-it.min.js')}}
{{HTML::script('js/jquery.geocomplete.js')}}
{{HTML::script('js/jquery.ui.map.js')}}
{{HTML::script('js/jquery.ui.map.extensions.js')}}
{{HTML::script('js/min/selectize-min.js')}}
{{HTML::script('js/mapa.js')}}
{{HTML::script('js/bjqs-1.3.min.js')}}
<script>
	$('.carousel').bjqs({
		'height' : 245,
		'width' : 404,
		'responsive' : false,
		animtype : 'slide',
		nexttext : '<i class="fa fa-chevron-right fa-lg"></i>',
		prevtext : '<i class="fa fa-chevron-left fa-lg"></i>'
	});
</script>
@stop

@section('css')
{{HTML::style('http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css')}}
{{HTML::style('css/vendor/bjqs.css')}}
{{HTML::style('css/vendor/selectize.css')}}
{{HTML::style('css/vendor/jquery.tagit.css')}}
@stop