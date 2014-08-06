@extends('front.layouts.default')
@section('content')
<div id="main" class="col-13">

</div>
<div id="sidebar" class="col-7">
	@include('front._includes.next-spots')
	@include('front._includes.newsletter')
</div>
<input name="" type="hidden" id="parent_url" value="{{route('trucks_path')}}"/>
@stop