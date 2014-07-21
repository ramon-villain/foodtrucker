@extends('front.layouts.default')

@section('content')

	@include('front._includes.errors')

	{{Form::open(['route' => 'register_path'])}}
		<div class="form-group">
			{{Form::label('nome', 'Nome')}}
			{{Form::text('nome','', array('class' => 'form-control', 'placeholder' => 'Nome'))}}
		</div>
		<div class="form-group">
			{{Form::label('sobrenome', 'Sobrenome')}}
			{{Form::text('sobrenome','', array('class' => 'form-control', 'placeholder' => 'Sobrenome'))}}
		</div>
		<div class="form-group">
			{{Form::label('email', 'Email')}}
			{{Form::email('email','', array('class' => 'form-control', 'placeholder' => 'Email'))}}
		</div>
		<div class="form-group">
			{{Form::label('password', 'Senha')}}
			{{Form::password('password','', array('class' => 'form-control'))}}
		</div>
		<div class="form-group">
			{{Form::label('password_confirmation', 'Confirmação da Senha')}}
			{{Form::password('password_confirmation','', array('class' => 'form-control'))}}
		</div>
		{{Form::submit('Registrar')}}

	{{Form::close()}}
@stop