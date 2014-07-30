@extends('back.layouts.default')

@section('content')
@include('front._includes.errors')
<div class="col-10">
	@include('back._includes.addPost')
</div>
<div class="col-10">
 {{-- @include('back._includes.getPosts') --}}
</div>
@stop