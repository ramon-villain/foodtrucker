@extends('back.layouts.default')

@section('content')
@include('back._includes.errors')
<div class="col-10">
	<div class="widget">
		<div class="title green">
			<h2>Editar Post</h2>
		</div>
		<div class="body bordered">
			{{Form::model($data['post'], ['files' => true, 'route' => ['edit_post_admin_path', $data['post']->id]])}}

			{{Form::label('titulo', 'Título:')}}
			<div class="wrapInput">{{Form::text('titulo',$data['post']->titulo,['placeholder' => 'Postagem marota'])}}</div>

			{{Form::label('body', 'Conteúdo:')}}
			<div class="wrapInput wrapTextarea">{{Form::textarea('body',$data['post']->body,['placeholder' => 'Conteúdo legal', 'class' => 'editor'])}}</div>

			{{Form::label('imagem', 'Imagem em Publicação:')}}
			<div class="wrapInput">{{Form::file('imagem')}}</div>

			{{Form::label('publish_at', 'Data de Publicação:')}}
			<div class="wrapInput">{{Form::text('publish_at',$data['post']->publish_at,['placeholder' => '29/06/2014'])}}</div>

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
			{{HTML::image($data['post']->imagem, '', ['style' => 'max-width:100%'])}}
		</div>
	</div>
</div>

@stop

@section('scripts')
{{HTML::script('js/min/wysihtml5-0.3.0-min.js')}}
{{HTML::script('js/bootstrap.min.js')}}
{{HTML::script('js/min/bootstrap-wysihtml5-min.js')}}
{{HTML::script('js/min/jquery.datetimepicker-min.js')}}
<script>
	$('.editor').wysihtml5({
		"font-styles": false,
		"stylesheets": false
	});
	$('#publish_at').appendDtpicker({
		"locale": "br",
		"autodateOnStart": false,
		"calendarMouseScroll": false,
		"dateFormat":'YYYY-MM-DD hh:mm:00'
	});

</script>
@stop

@section('css')
{{HTML::style('css/vendor/jquery.datetimepicker.css')}}
{{HTML::style('css/vendor/bootstrap.min.css')}}
{{HTML::style('css/vendor/bootstrap-wysihtml5.css')}}
@stop