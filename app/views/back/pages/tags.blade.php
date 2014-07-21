@extends('back.layouts.default')

@section('content')
@include('front._includes.errors')
<div class="col-7">
	{{Form::open(['route' => 'new_tag_admin_path', 'class' => 'form'])}}

	{{Form::label('tags', 'Tag:')}}
	{{Form::text('tags','',['placeholder' => 'mexicano'])}}

	{{Form::submit('Adicionar Tag', ['class' => 'btn btn-green fr'] )}}
	{{Form::close()}}
</div>
<div class="col-5">
@include('back._includes.getTag')
</div>
{{--
{{Form::open(['route' => 'new_tag_truck_admin_path', 'class' => 'form col-7'])}}

{{Form::label('tagsRelated', 'Tags:')}}
{{Form::text('tagsRelated')}}

{{Form::label('trucks', 'Truck:')}}
{{Form::text('trucks')}}

{{Form::label('spots', 'Spots:')}}
{{Form::text('spots')}}

{{Form::submit('Relacionar Tag', ['class' => 'btn btn-green fr'] )}}
{{Form::close()}}
--}}
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
			$.ajax({
				url: "/js/tags/"+search.term,
				data: {q: search.term},
				success: function(choices) {
					showChoices(that._subtractArray(choices, that.assignedTags()));
				}
			});
		}
	});
//	var trucks, spots;
//	$("#tagsRelated").tagit({
//		fieldName: "tags",
//		allowSpaces: true,
//		tagSource: function(search, showChoices) {
//			var that = this;
//			$.ajax({
//				url: "/js/tags/"+search.term,
//				data: {q: search.term},
//				success: function(choices) {
//					showChoices(that._subtractArray(choices, that.assignedTags()));
//				}
//			});
//		}
//	});
//
//	$("#trucks").tagit({
//		fieldName: "tags",
//		allowSpaces: true,
//		afterTagAdded: function(){
//			$('label').hide();
//			console.log('a');
//		}
////		tagSource: function(search, showChoices) {
////			var that = this;
////			$.ajax({
////				url: "/js/trucks/"+search.term,
////				data: {q: search.term},
////				success: function(choices) {
////					trucks = choices;
////					showChoices(that._subtractArray(choices, that.assignedTags()));
////				}
////			});
////		},beforeTagAdded: function (event, ui) {
////			if($.inArray(ui.tagLabel, trucks)==-1) return false;
////		}
//	});
//	console.log();
//
//	$("#spots").tagit({
//		fieldName: "tags",
//		allowSpaces: true,
//		tagSource: function(search, showChoices) {
//			var that = this;
//			$.ajax({
//				url: "/js/spots/"+search.term,
//				data: {q: search.term},
//				success: function(choices) {
//					spots = choices;
//					showChoices(that._subtractArray(choices, that.assignedTags()));
//				}
//			});
//		},beforeTagAdded: function (event, ui) {
//			if($.inArray(ui.tagLabel, spots)==-1) return false;
//		}
//	});
</script>
@stop

@section('css')
{{HTML::style('css/vendor/jquery.datetimepicker.css')}}
{{HTML::style('http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css')}}
{{HTML::style('css/vendor/jquery.tagit.css')}}
@stop