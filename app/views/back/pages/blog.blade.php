@extends('back.layouts.default')

@section('content')
@include('back._includes.errors')
<div class="col-10">
	@include('back._includes.addPost')
</div>
<div class="col-10">
 @include('back._includes.getPosts')
</div>

@stop

@section('scripts')
{{HTML::script('js/wysihtml5-0.3.0.js')}}
{{HTML::script('js/bootstrap.min.js')}}
{{HTML::script('js/bootstrap-wysihtml5.js')}}
{{HTML::script('js/jquery.datetimepicker.js')}}
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