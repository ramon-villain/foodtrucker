@extends('back.layouts.default')

@section('content')
@include('back._includes.errors')
<div class="col-10">
	@include('back._includes.addEvento')
</div>
<div class="col-10">
	@include('back._includes.getEvento')
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