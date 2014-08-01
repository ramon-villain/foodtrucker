<div class="widget">
	<div class="title green">
		<h2>Adicionar Spot</h2>
	</div>
	<div class="body bordered">
		{{Form::open(['route' => 'new_spot_admin_path', 'class' => 'form'])}}

		{{Form::label('truck_id', 'Escolha um Food Truck:')}}
		{{Form::select('truck_id', $data['trucks'])}}

		{{Form::label('endereco', 'Endereço do Spot:')}}
		<div class="wrapInput">{{Form::text('endereco','',['placeholder' => 'Avenida Paulista, 800, São Paulo - SP'])}}</div>

		{{Form::label('inicio', 'Dia e Horário de Início:')}}
		<div class="wrapInput">{{Form::text('inicio','',['placeholder' => '29/06/2014 - 10:00'])}}</div>

		{{Form::label('fim', 'Dia e Horário de Fim:')}}
		<div class="wrapInput">{{Form::text('fim','',['placeholder' => '29/06/2014 - 10:00'])}}</div>

		{{Form::label('tags', 'Tags:')}}
		{{Form::text('tags','',['placeholder' => 'sobremesa, bebida'])}}

		{{Form::label('descriptionSpot', 'Descrição:')}}
		<div class="wrapInput wrapTextarea">{{Form::textarea('description','',['placeholder' => 'Avenida Paulista, 800, São Paulo - SP'])}}</div>

		{{Form::submit('Adicionar Spot', ['class' => 'btn btn-green fr'] )}}
		{{Form::close()}}
	</div>
</div>
