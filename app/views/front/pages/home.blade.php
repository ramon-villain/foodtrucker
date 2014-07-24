@extends('front.layouts.default')
@include('back._includes.errors')
@section('content')
<div id="main" class="col-13">
	<div id="mapa" class="mb20" style="background: #000;height: 446px;display: block;width: 100%;"></div>
	<div id="truckDaSemana" class="col-5 alpha widget">
		<div class="title blue"><i class="fa fa-trophy"></i><h2>{{$featured->title}}</h2></div>
		<div class="body" style="background-image: url({{$featured->image}})">
			<h3>{{$featured->body}}</h3>
		</div>
	</div>

	<div id="anota-ai" class="col-8 omega widget ">
		<div class="title green"><i class="fa fa-calendar-o"></i><h2>Anota Ai!</h2> <!--<span>Hoje</span>--></div>
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
	@include('front._includes.next-spots')
	@include('front._includes.newsletter')
</div>
@stop
@section('scripts')
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
{{HTML::style('css/vendor/bjqs.css')}}
@stop