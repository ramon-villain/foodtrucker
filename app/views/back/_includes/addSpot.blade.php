<div class="widget">
	<div class="title green">
		<h2>Adicionar Spot</h2>
	</div>
	<div class="body bordered">
		{{Form::open(['route' => 'new_spot_admin_path', 'class' => 'form'])}}
		{{Form::label('truck_id', 'Escolha um Food Truck:')}}
		<select name="truck_id" id="truck_id" class="form-control filter_select">
			@foreach ($data['trucks'] as $truck)
				<option value="{{$truck->nome}}">{{$truck->nome}}</option>
			@endforeach
		</select>

		{{Form::label('endereco', 'Endereço do Spot:')}}
		<div class="wrapInput">{{Form::text('endereco','',['placeholder' => 'Avenida Paulista, 800, São Paulo - SP', 'class' => 'geo'])}}</div>
		<input name="lat" type="hidden" class="geo" value="">
		<input name="lng" type="hidden" class="geo" value="">

		{{Form::label('inicio', 'Dia e Horário de Início:')}}
		<div class="wrapInput">{{Form::text('inicio','',['placeholder' => '2014-06-29 10:00'])}}</div>

		{{Form::label('fim', 'Dia e Horário de Fim:')}}
		<div class="wrapInput">{{Form::text('fim','',['placeholder' => '2014-06-29 14:00'])}}</div>

		{{Form::label('tags', 'Tags:')}}
		{{Form::text('tags','',['placeholder' => 'sobremesa, bebida'])}}

		{{Form::label('descriptionSpot', 'Descrição:')}}
		<div class="wrapInput wrapTextarea">{{Form::textarea('description','',['placeholder' => 'Avenida Paulista, 800, São Paulo - SP'])}}</div>

		{{Form::submit('Adicionar Spot', ['class' => 'btn btn-green fr'] )}}
		{{Form::close()}}
	</div>
</div>
