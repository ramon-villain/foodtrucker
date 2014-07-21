@extends('back.layouts.default')

@section('content')
@include('front._includes.errors')
{{Form::open(['route' => 'new_tag_admin_path', 'class' => 'form col-7'])}}

{{Form::label('tags', 'Tag:')}}
{{Form::text('tags','',['placeholder' => 'mexicano'])}}

{{Form::submit('Adicionar Tag', ['class' => 'btn btn-green fr'] )}}
{{Form::close()}}

<div class="sidebar col-3">
	@include('back._includes.getTag')
</div>
@stop

@section('scripts')
{{HTML::script('js/tag-it.min.js')}}
{{HTML::script('js/jquery.datetimepicker.js')}}
<script>
	$('#fim, #inicio').appendDtpicker({
		"locale": "br",
		"autodateOnStart": false,
		"calendarMouseScroll": false,
		"dateFormat":'DD/MM/YYYY - hh:mm'
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