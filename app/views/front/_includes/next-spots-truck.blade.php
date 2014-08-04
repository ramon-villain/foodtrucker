<div id="ultimasParadas" class="widget">
	<div class="title grey"><i class="fa fa-check-square"></i><h2>Próximas Paradas</h2></div>
	<div class="body bordered">
			<ul>
				<h3>{{ $truck->nome }}</h3>
				@foreach ($spots as $spot)
				<li> <b>{{dataSpotFront($spot->abertura, $spot->inicio)}}</b> - {{ $spot->local}}</li>

				@endforeach
			</ul>
	</div>
</div>