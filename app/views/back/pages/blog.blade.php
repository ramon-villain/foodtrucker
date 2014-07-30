@extends('back.layouts.default')

@section('content')
@include('front._includes.errors')
<div class="col-10">
	@include('back._includes.addPost')
</div>
<div class="col-10">
 @include('back._includes.getPosts')
</div>
@stop

@section('scripts')
{{HTML::script('js/jquery.datetimepicker.js')}}
<script>
	$('#publish_at').appendDtpicker({
		"locale": "br",
		"autodateOnStart": false,
		"calendarMouseScroll": false,
		"dateFormat":'DD/MM/YYYY - hh:mm'
	});
</script>
@stop

@section('css')
{{HTML::style('css/vendor/jquery.datetimepicker.css')}}
@stop