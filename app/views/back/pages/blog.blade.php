@extends('back.layouts.default')

@section('content')
@include('back._includes.errors_alert')
<div class="col-10">
	@include('back._includes.addPost')
</div>
<div class="col-10">
 @include('back._includes.getPosts')
</div>
<input name="" type="hidden" id="parent_url" value="{{route('blog_admin_path')}}"/>
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