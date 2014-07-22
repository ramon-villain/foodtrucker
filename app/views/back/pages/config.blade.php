@extends('back.layouts.default')

@section('content')
@include('front._includes.errors')
<div class="col-7">
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Recortar Imagem</h4>
				</div>
				<div class="modal-body">
					{{HTML::image($data['imagemDestaque'],'', ['id'=> 'cropbox'])}}
					{{Form::open(['route' => 'crop_upload_image', 'files'=> 'true', 'onsubmit' => 'return checkCoords();'])}}
					<input type="hidden" id="src" name="src" value="{{$data['imagemDestaque'] or 'a'}}" />
					<input type="hidden" id="x" name="x" />
					<input type="hidden" id="y" name="y" />
					<input type="hidden" id="w" name="w" />
					<input type="hidden" id="h" name="h" />

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	{{Form::open(['route' => 'featured_upload', 'files'=> 'true'])}}
		{{Form::label('title', 'Título do Destaque:')}}
		<div class="wrapInput">{{Form::text('title',$featured->title,['placeholder' => 'Foodtruck da Semana'])}}</div>
		{{Form::label('body', 'Conteúdo do Destaque:')}}
		<div class="wrapInput">{{Form::text('body',$featured->body,['placeholder' => 'La Buena Station'])}}</div>
		@if($featured->image != '')
			{{HTML::image($featured->image)}}
		@endif
		{{Form::file('image')}}
		{{Form::hidden('image_bckp', $featured->image)}}
		{{Form::submit('Atualizar Destaque', ['class' => 'btn btn-green fr'] )}}
	{{Form::close()}}
</div>
<div class="sidebar col-13">

</div>
<input name="modal" id="modal" value="{{$data['modal']}}" type="hidden"/>

@stop

@section('scripts')
{{HTML::script('js/bootstrap.min.js')}}
{{HTML::script('js/jquery.Jcrop.min.js')}}
<script>
	var modal
	if($('#modal').val() == 'true'){
		modal = true
	}else{
		modal = false
	};
	$( document ).ready( function() {
		$( '#myModal' ).modal( {show: modal} );
		$('#cropbox').Jcrop({
			aspectRatio: 1,
			onSelect: updateCoords
		});
	});
	function updateCoords(c)
	{
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
	};

	function checkCoords()
	{
		if (parseInt($('#w').val())) return true;
		alert('Selecione a região para recortar.');
		return false;
	};
</script>
@stop

@section('css')
{{HTML::style('css/vendor/bootstrap.min.css')}}
{{HTML::style('css/vendor/jquery.Jcrop.min.css')}}
@stop