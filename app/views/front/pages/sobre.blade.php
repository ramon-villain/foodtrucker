@extends('front.layouts.default')
@section('content')
<div id="main" class="col-13">
	<div class="pageTitle">
		<h1>Sobre Nós</h1>
	</div>

</div>
<div id="sidebar" class="col-7">
	@include('front._includes.next-spots')
	@include('front._includes.newsletter')
</div>
@stop
@section('scripts')
{{HTML::script('js/jquery.mask.min.js')}}
<script>
	$('#telefone').mask('(00) 00009-0000');
</script>
@stop