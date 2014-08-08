@extends('back.layouts.default')

@section('content')
@include('back._includes.errors')
<div class="col-10">
	<div class="widget">
		<div class="title green">
			<h2>Editar Evento</h2>
		</div>
		<div class="body bordered">
			{{Form::model($data['eventos'], ['class' => 'form', 'files' => true, 'route' => ['edit_evento_admin_path', $data['eventos']->id]])}}

			{{Form::label('nome', 'Nome do Evento:')}}
			<div class="wrapInput">{{Form::text('nome',$data['eventos']->nome,['placeholder' => 'Feirinha de comidinhas'])}}</div>

			{{Form::label('local', 'Local do Evento:')}}
			<div class="wrapInput">{{Form::text('local',$data['eventos']->local,['placeholder' => 'Avenida Paulista, 800, São Paulo'])}}</div>

			{{Form::label('imagem', 'Imagem do Evento:')}}
			<div class="wrapInput">{{Form::file('imagem')}}</div>

			{{Form::label('data', 'Dia do Evento:')}}
			<div class="wrapInput">{{Form::text('data',$data['eventos']->data,['placeholder' => '2014-06-29'])}}</div>

			{{Form::label('description', 'Descrição do Evento:')}}
			<div class="wrapInput wrapTextarea">{{Form::textarea('description',$data['eventos']->description,['placeholder' => 'Muita comida e gente legal', 'class' => 'editor'])}}</div>

			{{Form::submit('Editar Post', ['class' => 'btn btn-green fr'] )}}
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
			{{HTML::image($data['eventos']->imagem, '', ['style' => 'max-width:100%'])}}
		</div>
	</div>
</div>
<input name="" type="hidden" id="parent_url" value="{{route('evento_admin_path')}}"/>
@stop

@section('scripts')
{{HTML::script('js/min/jquery.datetimepicker-min.js')}}
{{HTML::script('js/min/wysihtml5-0.3.0-min.js')}}
{{HTML::script('js/bootstrap.min.js')}}
{{HTML::script('js/min/bootstrap-wysihtml5-min.js')}}
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
{{HTML::script('js/jquery.geocomplete.js')}}
<script>
	$("#local").geocomplete({
		details: "form"
	});
	$('.editor').wysihtml5({
		"font-styles": false,
		"stylesheets": false
	});
	$('#data').appendDtpicker({
		"locale": "br",
		"autodateOnStart": false,
		"calendarMouseScroll": false,
		"closeOnSelected": true,
		"dateFormat":'YYYY-MM-DD'
	});

</script>
@stop

@section('css')
{{HTML::style('css/vendor/jquery.datetimepicker.css')}}
{{HTML::style('css/vendor/bootstrap.min.css')}}
{{HTML::style('css/vendor/bootstrap-wysihtml5.css')}}
@stop