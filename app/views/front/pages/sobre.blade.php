@extends('front.layouts.default')
@section('content')
<div id="main" class="col-13 widget">
	<div class="pageTitle">
		<h1>Sobre Nós</h1>
	</div>
	<div class="pageBody">
		<p>A gente ama comer. <br/>
		A gente ama fotografar.<br/>
		A gente ama conhecer novos lugares.<br/>
		A gente ama até mesmo São Paulo, por mais sufocante que essa cidade possa ser.</p>

		<p>E a gente quer que você ame também!</p>

		<p>Com tantos Trucks pipocando pelas ruas (que bom!) fica difícil seguir todos eles e saber quais eventos vão bombar no final de semana, né?</p>

		<p>Então criamos o Food Trucker. <br/>
		Por paixão.<br/>
		Paixão à tudo. Paixão até mesmo à nós!</p>

		<p>Queremos ajudar esse movimento de rua a crescer cada vez mais e ajudar você a participar disso com a gente.</p>

		<p>Então vem na #caronadotrucker! Porque na rua é muito mais legal :)</p>
	</div>
</div>
<div id="sidebar" class="col-7">
	@include('front._includes.next-spots')
	@include('front._includes.newsletter')
</div>
<input name="" type="hidden" id="parent_url" value="{{route('sobre_path')}}"/>
@stop
@section('scripts')
{{HTML::script('js/jquery.mask.min.js')}}
<script>
</script>
@stop