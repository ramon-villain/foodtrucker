@extends('front.layouts.default')
@section('content')
<div id="main" class="col-13 widget">
	@include('front._includes.errors_alert')
	<div class="pageTitle">
		@if(!$repos == null)
		<h1>Resultado da busca: {{$query}}</h1>
		@endif
	</div>
	<?php $ids = []?>
	@if($repos[1])
	@for ($i = 0; $i < count($repos[1]); $i++)
	<?php $ids[] = $i?>
	<div class="widget">
		<div class="body full_bordered">
			<h2 class="searchTitle"><a href="{{url()}}/truck/{{$repos[1][$i]['slug']}}">{{$repos[1][$i]['nome']}}</a></h2>
			<span class="categoria"><a href="{{url()}}/trucks">TRUCKS</a> | </span> <span class="link"><a href="{{url()}}/truck/{{$repos[1][$i]['slug']}}">{{url()}}/truck/{{$repos[1][$i]['slug']}}</a></span>
			<p>{{$repos[1][$i]['description']}}</p>
		</div>
	</div>
	@endfor
	@endif
	@if($repos[2])
	@for ($i = 0; $i < count($repos[2][0]); $i++)

		@if(!in_array($i, $ids))
		<div class="widget">
			<div class="body full_bordered">
				<h2 class="searchTitle"><a href="{{url()}}/truck/{{$repos[2][0][$i]['slug']}}">{{$repos[2][0][$i]['nome']}}</a></h2>
				<span class="categoria"><a href="{{url()}}/trucks">TRUCKS</a> | </span> <span class="link"><a href="{{url()}}/truck/{{$repos[2][0][$i]['slug']}}">{{url()}}/truck/{{$repos[2][0][$i]['slug']}}</a></span>
				<p>{{$repos[2][0][$i]['description']}}</p>
			</div>
		</div>
		@endif
	@endfor
	@endif

	@if($repos[0])
	@for ($i = 0; $i < count($repos[0]); $i++)
	<div class="widget">
		<div class="body full_bordered">
			<h2 class="searchTitle"><a href="{{route('eventos_path')}}">{{$repos[0][$i]['nome']}}</a></h2>
			<span class="categoria"><a href="{{route('eventos_path')}}">EVENTOS</a> | </span> <span class="link"><a href="{{route('eventos_path')}}">{{route('eventos_path')}}</a></span>
			<p>{{$repos[0][$i]['description']}}</p>
		</div>
	</div>
	@endfor
	@endif

	@if($repos[3])
	@for ($i = 0; $i < count($repos[3]); $i++)
	<div class="widget">
		<div class="body full_bordered">
			<h2 class="searchTitle"><a href="{{url()}}/blog/{{$repos[3][$i]['slug']}}">{{$repos[3][$i]['titulo']}}</a></h2>
			<span class="categoria"><a href="{{url()}}/blog">BLOG</a> | </span> <span class="link"><a href="{{url()}}/blog/{{$repos[3][$i]['slug']}}">{{url()}}/truck/{{$repos[3][$i]['slug']}}</a></span>
			<p>{{$repos[3][$i]['body']}}</p>
		</div>
	</div>
	@endfor
	@endif
	@if($repos == null)
	<div class="pageTitle">
		<h1>Nenhum resultado encontrado.</h1>
	</div>

	<div class="widget">
		<div class="body full_bordered">
			<p class="mclear">Sua busca <b>{{$query}}</b> não retornou resultados. <br/>
				Tente novamente com outros termos.</p>
		</div>
	</div>
	@endif
</div>
<div id="sidebar" class="col-7">
	@include('front._includes.next-spots')
	@include('front._includes.newsletter')
</div>
@stop
@section('scripts')
{{HTML::script('js/jquery.mask.min.js')}}
<script>
	$('#telefone').mask('(00) 00009-0000');
</script>
@stop