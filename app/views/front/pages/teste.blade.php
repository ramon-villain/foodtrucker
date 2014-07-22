@extends('front.layouts.default')

@section('content')
<div id="main" class="col-13">
	{{Form::open(['route' => 'upload_image', 'files'=> 'true'])}}
	{{Form::file('imagem')}}
	{{Form::submit('enviar')}}
	{{Form::close()}}
</div>
<div id="sidebar" class="col-13">
	<img src="{{$imageFinal or 'a'}}" id="cropbox"/>
	{{Form::open(['route' => 'crop_upload_image', 'files'=> 'true', 'onsubmit' => 'return checkCoords();'])}}
		<input type="hidden" id="src" name="src" value="{{$imageFinal or 'a'}}" />
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />
		<input type="submit" value="Crop Image" />
	</form>
</div>
@stop
@section('scripts')
{{HTML::script('js/jquery.Jcrop.min.js')}}
<script>
	$(function(){

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
{{HTML::style('css/vendor/jquery.Jcrop.min.css')}}
@stop