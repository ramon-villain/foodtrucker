@extends('back.layouts.default')

@section('content')
@include('front._includes.errors')
<div class="col-7">
	{{Form::open(['route' => 'destaque_upload', 'files'=> 'true'])}}
		{{Form::label('tituloDestaque', 'Título do Destaque:')}}
		<div class="wrapInput">{{Form::text('tituloDestaque',$data['titulo'],['placeholder' => 'Foodtruck da Semana'])}}</div>
		{{Form::label('bodDestaque', 'Conteúdo do Destaque:')}}
		<div class="wrapInput">{{Form::text('bodDestaque',$data['body'],['placeholder' => 'La Buena Station'])}}</div>
		<img src="{{$data['image']}}"/>
		{{Form::file('imagem')}}
		{{Form::submit('Atualizar Destaque', ['class' => 'btn btn-green fr'] )}}
	{{Form::close()}}
</div>
<div class="sidebar col-13">

</div>
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
	$("#tags, #newTag").tagit({
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