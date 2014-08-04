@extends('front.layouts.default')

@section('content')

@include('front._includes.errors')
<div id="main" class="col-13">
{{Form::open(['route' => 'login_path','class' => 'form col-8'])}}
	<h1>Faça seu login, aqui. :)</h1>
	{{Form::label('email', 'Email')}}
	<div class="wrapInput">{{Form::email('email','', array('placeholder' => 'email@exemplo.com', 'required' => 'required'))}}</div>

	{{Form::label('password', 'Senha')}}
	<div class="wrapInput">{{Form::password('password','', array('required' => 'required'))}}</div>

	{{Form::submit('Logar', ['class' => 'btn btn-green fr'])}}

{{Form::close()}}
	</div>
@stop