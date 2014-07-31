@extends('back.layouts.default')

@section('content')
@include('back._includes.errors')
<div class="col-10">
	@include('back._includes.setHomeFeatured')
</div>
<div class="col-10">

	@include('back._includes.getBanner')
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
		$('#featured').Jcrop({
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