@extends('front.layouts.default')
@section('content')
<div id="main" class="col-13">
	@foreach ($eventos as $evento)
		<div class="widget evento">
			<div class="data">{{dataEvento($evento->data)}}</div>
			<div class="body">
				{{HTML::image($evento->imagem, '')}}
				<div class="infos">
					<h3>{{ $evento->local }}</h3>
					<h2>{{ $evento->nome }}</h2>
					{{ $evento->description }}
				</div>
			</div>
		</div>
	@endforeach
</div>
<div id="sidebar" class="col-7">
	@include('front._includes.next-spots')
	@include('front._includes.newsletter')
</div>
<input name="" type="hidden" id="parent_url" value="{{route('eventos_path')}}"/>
@stop
@section('scripts')
{{HTML::script('js/jquery.mask.min.js')}}
<script>
</script>
@stop