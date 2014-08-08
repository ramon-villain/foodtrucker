@extends('back.layouts.default')

@section('content')
@include('back._includes.errors')
<div class="col-7">
	@include('back._includes.addSpot')
</div>
<div class="sidebar col-13">
	@include('back._includes.getSpot')
</div>
<input name="" type="hidden" id="parent_url" value="{{route('spot_admin_path')}}"/>
@stop

@section('scripts')
{{HTML::script('js/tag-it.min.js')}}
{{HTML::script('js/min/jquery.datetimepicker-min.js')}}
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
{{HTML::script('js/jquery.geocomplete.js')}}
<script>
	$("#endereco").geocomplete({
		details: "form"
	});
	$('#fim, #inicio').appendDtpicker({
		"locale": "br",
		"autodateOnStart": false,
		"calendarMouseScroll": false,
		"closeOnSelected": true,
		"dateFormat":'YYYY-MM-DD hh:mm:00'
	});
	$("#tags").tagit({
		fieldName: "tags",
		allowSpaces: true,
		tagSource: function(search, showChoices) {
			var that = this;
			console.log(search);
			$.ajax({
				url: "/js/tags/"+search.term,
				data: {q: search.term},
				success: function(choices) {
					showChoices(that._subtractArray(choices, that.assignedTags()));
				}
			});
		}
	});
</script>
@stop

@section('css')
{{HTML::style('css/vendor/jquery.datetimepicker.css')}}
{{HTML::style('http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css')}}
{{HTML::style('css/vendor/jquery.tagit.css')}}
@stop