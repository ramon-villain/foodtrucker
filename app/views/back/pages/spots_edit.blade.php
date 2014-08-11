@extends('back.layouts.default')

@section('content')
@include('back._includes.errors')
<div class="col-10">
	<div class="widget">
		<div class="title green">
			<h2>Editar Spot</h2>
		</div>
		<div class="body bordered">
			{{Form::model($data['spot'], ['files' => true, 'route' => ['edit_spot_admin_path', $data['spot']->id]])}}
			{{Form::label('truck_id', 'Escolha um Food Truck:')}}
			<select name="truck_id" id="truck_id" class="form-control filter_select">
				@foreach ($data['trucks'] as $truck)
					@if($data['spot']->truck_id == $truck->id)
						<option value="{{$truck->nome}}" selected>{{$truck->nome}}</option>
					@endif
					@unless($data['spot']->truck_id == $truck->id)
						<option value="{{$truck->nome}}">{{$truck->nome}}</option>
					@endif
				@endforeach
			</select>

			{{Form::label('endereco', 'Endereço do Spot:')}}
			<div class="wrapInput">{{Form::text('endereco',$data['spot']->local,['placeholder' => 'Avenida Paulista, 800, São Paulo - SP'])}}</div>

			{{Form::label('inicio', 'Dia e Horário de Início:')}}
			<div class="wrapInput">{{Form::text('inicio',$data['spot']->abertura .' '. $data['spot']->inicio,['placeholder' => '2014-06-29 10:00'])}}</div>

			{{Form::label('fim', 'Dia e Horário de Fim:')}}
			<div class="wrapInput">{{Form::text('fim',$data['spot']->encerramento .' '. $data['spot']->fim,['placeholder' => '2014-06-29 14:00'])}}</div>

			{{Form::label('tags', 'Tags:')}}
			{{Form::text('tags',$data['tags'],['placeholder' => 'sobremesa, bebida'])}}

			{{Form::label('descriptionSpot', 'Descrição:')}}
			<div class="wrapInput wrapTextarea">{{Form::textarea('description',$data['spot']->description,['placeholder' => 'Avenida Paulista, 800, São Paulo - SP'])}}</div>
			{{Form::submit('Editar Spot', ['class' => 'btn btn-green fr'] )}}
			{{Form::close()}}
		</div>
	</div>
</div>
<div class="col-10">

</div>
<input name="" type="hidden" id="parent_url" value="{{route('spot_admin_path')}}"/>
@stop
@section('scripts')
{{HTML::script('js/tag-it.min.js')}}
{{HTML::script('js/min/jquery.datetimepicker-min.js')}}
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=pt-BR"></script>
{{HTML::script('js/jquery.geocomplete.js')}}
{{HTML::script('js/min/selectize-min.js')}}
<script>
	$("#endereco").geocomplete({
		details: "form"
	});
	$('#fim, #inicio').appendDtpicker({
		"locale": "br",
		"autodateOnStart": false,
		"calendarMouseScroll": false,
		"closeOnSelected": true,
		"dateFormat":'YYYY-MM-DD hh:mm:00'
	});
	$("#tags").tagit({
		fieldName: "tags",
		allowSpaces: true,
		tagSource: function(search, showChoices) {
			var that = this;
			console.log(search);
			$.ajax({
				url: "/js/tags/"+search.term,
				data: {q: search.term},
				success: function(choices) {
					showChoices(that._subtractArray(choices, that.assignedTags()));
				}
			});
		}
	});
	$('#truck_id').selectize();
</script>
@stop

@section('css')
{{HTML::style('css/vendor/jquery.datetimepicker.css')}}
{{HTML::style('http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css')}}
{{HTML::style('css/vendor/jquery.tagit.css')}}
{{HTML::style('css/vendor/selectize.css')}}
@stop
