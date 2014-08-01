@extends('back.layouts.default')

@section('content')
@include('back._includes.errors')
<div class="col-10">
	<div class="widget">
		<div class="title green">
			<h2>Editar Truck</h2>
		</div>
		<div class="body bordered">
			{{Form::model($data['truck'], ['files' => true, 'route' => ['edit_truck_admin_path', $data['truck']->id]])}}

			{{Form::label('nome', 'Nome do Food Truck:')}}
			<div class="wrapInput">{{Form::text('nome', $data['truck']->nome, ['placeholder' => 'Buzina Food Truck'])}}</div>

			{{Form::label('logo', 'Logo do Food Truck:')}}
			<div class="wrapInput">{{Form::file('logo','')}}</div>

			{{Form::label('description', 'Descrição:')}}
			<div class="wrapInput wrapTextarea">{{Form::textarea('description',$data['truck']->description,['placeholder' => 'Food Truck bem legal e cool!'])}}</div>

			{{Form::label('pagamento', 'Formas de Pagamento:')}}
			<div class="wrapInput">{{Form::text('pagamento',$data['truck']->pagamento,['placeholder' => 'Dinheiro, Cartão Visa ou Mastercard'])}}</div>

			{{Form::label('facebook', 'Facebook:')}}
			<div class="wrapInput">{{Form::text('facebook',$data['truck']->facebook,['placeholder' => 'foodtruckerbr'])}}</div>

			{{Form::label('instagram', 'Instagram:')}}
			<div class="wrapInput">{{Form::text('instagram',$data['truck']->instagram,['placeholder' => 'foodtruckerbr'])}}</div>

			{{Form::label('maisPedido', 'Mais Pedido:')}}
			<div class="wrapInput">{{Form::text('maisPedido',$data['truck']->maisPedido,['placeholder' => 'Hamburguer de Carne'])}}</div>

			{{Form::label('extras', 'Extras:')}}
			<div class="wrapInput wrapTextarea">{{Form::textarea('extras',$data['truck']->extras,['placeholder' => 'Música hype.'])}}</div>

			{{Form::submit('Editar Truck', ['class' => 'btn btn-green fr'] )}}
			{{Form::close()}}
		</div>
	</div>
</div>
<div class="col-10">
	<div class="widget">
		<div class="title yellow">
			<h2>Imagem Atual</h2>
		</div>
		<div class="body bordered">
			{{HTML::image($data['truck']->logo, '', ['style' => 'max-width:100%'])}}
		</div>
	</div>
</div>

@stop