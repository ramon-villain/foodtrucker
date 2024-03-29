@extends('front.layouts.default')
@section('content')
<div id="main" class="col-13 truck widget">
	@foreach ($cats as $cat)
	@if ($truck->cat_id == $cat->nome)
		<span class="pic">{{HTML::image($cat->imagem)}}</span><h1>{{$truck->nome}}</h1>
	@endif
	@endforeach
	<div class="widget" style="margin-bottom: 10px;">
		{{HTML::image($truck->logo, '', ['class' => 'logo col-5 alpha'])}}
		<div id="infos" class="col-8 omega">
			<ul>
				<li><b>Especialidade: </b>{{$truck->especialidade}}</li>
				<li><b>Categoria: </b>{{$truck->cat_id}}</li>
				<li><b>Mais pedidos: </b>{{$truck->mais_pedido}}</li>
				<li><b>Preço: </b>{{$truck->preco}}</li>
				<li><b>Site: </b> <a href="http://{{$truck->site or 'foodtrucker.com.br'}}" target="_blank">{{$truck->site or '---'}}</a></li>
				<li><b><i class="fa fa-facebook-square fa-lg"></i> </b><a href="http://fb.com/{{$truck->facebook}}" target="_blank">{{$truck->facebook}}</a></li>
				<li><b><i class="fa fa-instagram fa-lg"></i> </b><a href="http://instagram.com/{{$truck->instagram}}" target="_blank">{{$truck->instagram}}</a></li>
			</ul>
		</div>
		<div id="about">
			<p>{{$truck->description}}</p>
			<p class="servicos">
				<span>{{ respostaServico($servico[0]) }}<b>Sobremesa</b></span>
				<span>{{ respostaServico($servico[1]) }}<b>Bebidas</b></span>
				<span>{{ respostaServico($servico[2]) }}<b>Música</b></span>
				<span>{{ respostaServico($servico[3]) }}<b>Cartão de Débito</b></span>
				<span>{{ respostaServico($servico[4]) }}<b>Cartão de Crédito</b></span>
				<span>{{ respostaServico($servico[5]) }}<b>Vale-Refeição</b></span>
			</p>
		</div>
	</div>
	<div id="imagens">
		<a href="{{url($imagens[0])}}" data-lightbox="{{$truck->nome}}"> {{HTML::image($imagens[0], '' )}}</a>
		<a href="{{url($imagens[1])}}" data-lightbox="{{$truck->nome}}"> {{HTML::image($imagens[1], '' )}}</a>
		<a href="{{url($imagens[2])}}" data-lightbox="{{$truck->nome}}"> {{HTML::image($imagens[2], '' )}}</a>
	</div>
	<span><i class="fa fa-search fa-lg"></i> Clique nas imagens para ampliar</span>
</div>
<div id="sidebar" class="col-7">
	@include('front._includes.next-spots-truck')
	@include('front._includes.newsletter')
</div>
<input name="" type="hidden" id="parent_url" value="{{route('trucks_path')}}"/>
@stop

@section('scripts')
{{HTML::script('js/lightbox.min.js')}}
@stop

@section('css')
{{HTML::style('css/vendor/lightbox.css')}}
@stop