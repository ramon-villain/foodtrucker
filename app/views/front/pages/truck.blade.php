@extends('front.layouts.default')
@section('content')
<div id="main" class="col-13 truck">
	<h1>{{$truck->nome}}</h1>
	<div class="widget">
		{{HTML::image($truck->logo, '', ['class' => 'logo col-5 alpha'])}}
		<div id="infos" class="col-8 omega">
			<ul>
				<li><b>Especialidade: </b>{{$truck->especialidade}}</li>
				<li><b>Categoria: </b>{{$truck->cat_id}}</li>
				<li><b>Mais pedidos: </b>{{$truck->mais_pedido}}</li>
				<li><b>Preço: </b>{{$truck->preco}}</li>
				<li><b>Site: </b>{{$truck->site or '---'}}</li>
				<li><b><i class="fa fa-facebook-square fa-lg"></i> </b><a href="http://fb.com/{{$truck->facebook}}">{{$truck->facebook}}</a></li>
				<li><b><i class="fa fa-instagram fa-lg"></i> </b><a href="http://instagram.com/{{$truck->instagram}}">{{$truck->instagram}}</a></li>
			</ul>
		</div>
		<div id="about">
			<p>{{$truck->description}}</p>
		</div>
	</div>
	<div id="imagens">
		{{HTML::image($imagens[0], '')}}
		{{HTML::image($imagens[1], '')}}
		{{HTML::image($imagens[2], '')}}
	</div>
</div>
<div id="sidebar" class="col-7">
	@include('front._includes.newsletter')
</div>
@stop
@section('scripts')
{{HTML::script('js/jquery.mask.min.js')}}
<script>
</script>
@stop