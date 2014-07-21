@extends('back.layouts.default')

@section('content')
@include('front._includes.errors')
{{Form::open(['route' => 'newSpot_path', 'class' => 'form col-7'])}}
{{Form::label('truck', 'Escolha um Food Truck:')}}
{{Form::select('truck', ['1', 'Buzina Food Truck'])}}

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
@stop

@section('scripts')
{{HTML::script('js/tag-it.min.js')}}
{{HTML::script('js/jquery.datetimepicker.js')}}
<script>
	$('#fim, #inicio').appendDtpicker({
		"locale": "br",
		"autodateOnStart": false,
		"calendarMouseScroll": false,
		"dateFormat":'DD/MM/YYYY - hh:mm'
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
</script>
@stop

@section('css')
{{HTML::style('css/vendor/jquery.datetimepicker.css')}}
{{HTML::style('http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css')}}
{{HTML::style('css/vendor/jquery.tagit.css')}}
@stop