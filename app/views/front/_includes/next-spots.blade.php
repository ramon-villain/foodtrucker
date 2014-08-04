<div id="ultimasParadas" class="widget">
	<div class="title grey"><i class="fa fa-check-square"></i><h2>Próximas Paradas</h2></div>
	<div class="body bordered">
		@for($i=0;$i < count($spots); $i++)
			<ul>
				<h3>{{ $spots[$i]['nome'] }}</h3>
				@for ($b = 0; $b < (count($spots[$i]->toArray()) - 1); $b++)
				<li> <b>{{dataSpotFront($spots[$i]->toArray()[$b]['abertura'], $spots[$i]->toArray()[$b]['inicio'])}}</b> - {{ $spots[$i]->toArray()[$b]['local']}}</li>
				@endfor
			</ul>
		@endfor
	</div>
</div>