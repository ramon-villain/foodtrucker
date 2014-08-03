@extends('back.layouts.default')

@section('content')
@include('back._includes.errors')
@include('back._includes.stats')
<div class="col-10">
	@include('back._includes.addSpot')
	@include('back._includes.getSpot')
</div>

<div class="col-10">
	@include('back._includes.addTag')
	@include('back._includes.getTag')
</div>
<input name="" type="hidden" id="parent_url" value="{{route('dashboard')}}"/>
@stop

@section('scripts')
{{HTML::script('js/tag-it.min.js')}}
{{HTML::script('js/jquery.datetimepicker.js')}}
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
	$("#tags, #newTag").tagit({
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