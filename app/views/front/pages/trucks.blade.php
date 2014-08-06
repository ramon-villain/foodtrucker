@extends('front.layouts.default')
@section('content')
<div id="main" class="col-13 truck">
	<div class="options">
		<div class="fl">
			<select id="dynamic_select" class="form-control">
				<option value="" selected>Food Truck</option>
				@foreach ($trucks as $truck)
				<option value="{{url()}}/truck/{{$truck->slug}}">{{$truck->nome}}</option>
				@endforeach
			</select>
		</div>
		<div class="view">
			<button class="selectorReturn list"><i class="fa fa-bars"></i> Lista</button>
			<button class="selectorReturn grid"><i class="fa fa-th-large"></i> Grid</button>
		</div>
	</div>
	<div class="return list">
		@foreach ($cats as $cat)
		<div class="cat-title">
			<div class="title"><span class="pic">{{HTML::image($cat->imagem)}}</span><h2>{{ $cat->nome }}</h2></div>
		</div>
		@foreach ($trucks as $truck)
		@if ($truck->cat_id == $cat->id)
		<div class="widget">
			<a href="{{url()}}/truck/{{$truck->slug}}">{{HTML::image($truck->logo, $truck->nome, ['class' => 'logo col-4 alpha'])}}</a>
			<div id="infos" class="col-9 omega">
				<ul class="trucks-page">
					<li><b>Especialidade: </b>{{$truck->especialidade}}</li>
					<li><p>{{ $truck->description }}</p></li>
					<li><a href="{{url()}}/truck/{{$truck->slug}}">Saiba Mais</a></li>
				</ul>
			</div>
		</div>
		@endif
		@endforeach
		@endforeach
	</div>
	<div class="return grid" style="display: none;">
		@foreach ($cats as $cat)
		@foreach ($trucks as $truck)
		@if ($truck->cat_id == $cat->id)
		<div class="widget">
			<span class="pic">{{HTML::image($cat->imagem)}}</span><h2>{{ $cat->nome }}</h2>
			<a href="{{url()}}/truck/{{$truck->slug}}">{{HTML::image($truck->logo, $truck->nome, ['class' => 'logo col-4 alpha'])}}</a>
			<a href="{{url()}}/truck/{{$truck->slug}}">Saiba Mais</a>
		</div>
		@endif
		@endforeach
		@endforeach
	</div>
</div>
<div id="sidebar" class="col-7">
	@include('front._includes.next-spots')
	@include('front._includes.newsletter')
</div>
<input name="" type="hidden" id="parent_url" value="{{route('trucks_path')}}"/>
@stop
@section('scripts')
{{HTML::script('js/selectize.js')}}


<script>
	$('#dynamic_select').selectize({
		sortField: 'text'
	});
	$('#dynamic_select').bind('change', function () {
		var url = $(this).val(); // get selected value
		if (url) { // require a URL
			window.location = url; // redirect
		}
		return false;
	});
	$('.selectorReturn').on('click',function(e) {
		if ($(this).hasClass('grid')) {
			$('.return.list').hide();
			$('.return.grid').show();
		}
		else if($(this).hasClass('list')) {
			$('.return.list').show();
			$('.return.grid').hide();
		}
	});
</script>
@stop
@section('css')
{{HTML::style('css/vendor/selectize.css')}}
@stop
