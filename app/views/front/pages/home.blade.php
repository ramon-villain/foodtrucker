@extends('front.layouts.default')

@section('content')
<div id="main" class="col-13">
	<h1>a</h1>
	<div id="truckDaSemana" class="col-5 alpha widget">
		<div class="title blue"><i class="fa fa-trophy"></i><h2>{{$featured->title}}</h2></div>
		<div class="body">
			<img src="{{$featured->image}}" alt=""/>
			<h3>{{$featured->body}}</h3>
		</div>
	</div>
	<div id="anota-ai" class="col-8 omega widget">
		<div class="title green"><i class="fa fa-calendar-o"></i><h2>Anota Ai!</h2> <span>Hoje</span></div>
		<div class="body">
			<ul>
				<li>
					<img src="{{$featured->image}}" alt=""/>
					<h3>{{$featured->body}}</h3>
				</li>
			</ul>
		</div>

	</div>
</div>
<div id="sidebar" class="col-7">
	@include('front._includes.next-spots')
</div>
@stop