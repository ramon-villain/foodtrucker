@extends('front.layouts.default')
@section('content')
<div id="main" class="col-13 widget">
	@include('front._includes.errors_alert')
	<div class="pageTitle">
		<h1>Fale Conosco</h1>
	</div>
	{{ Form::open(['route' => 'contato_path', 'class' => 'form']) }}
		{{Form::label('nome', 'Seu Nome:*')}}
		<div class="wrapInput">{{Form::text('nome','',['placeholder' => 'Antônio Amigo da Silva'])}}</div>
		{{Form::label('email_contato', 'Seu Email:*')}}
		<div class="wrapInput">{{Form::email('email_contato','',['placeholder' => 'antonio@exemplo.com', 'required' => 'required'])}}</div>
		{{Form::label('telefone', 'Seu Telefone:')}}
		<div class="wrapInput">{{Form::text('telefone','',['placeholder' => '(11) 3344-4433'])}}</div>
		{{Form::label('mensagem', 'Sua Mensagem:*')}}
		<div class="wrapInput wrapTextarea">{{Form::textarea('mensagem','',['placeholder' => 'Olá, sou Antônio Amigo da Silva…'])}}</div>
		{{Form::submit('Enviar', ['class' => 'btn btn-green'])}}
	{{ Form::close() }}
</div>
<div id="sidebar" class="col-7">
	@include('front._includes.next-spots')
	@include('front._includes.newsletter')
</div>
<input name="" type="hidden" id="parent_url" value="{{route('contato_path')}}"/>
@stop
@section('scripts')
{{HTML::script('js/jquery.mask.min.js')}}
<script>
	$('#telefone').mask('(00) 00009-0000');
</script>
@stop