<div id="ultimasParadas" class="widget">
	<div class="title grey"><i class="fa fa-check-square"></i><h2>Próximas Paradas</h2></div>
	<div class="body bordered">
			<ul>
				<h3>{{ $spots[0]['nome'] }}</h3>
				@for ($i = 0; $i < count($spots[0]['spots']); $i++)
					<li> <b>{{dataSpotFront($spots[0]['spots'][$i]['abertura'], $spots[0]['spots'][$i]['inicio'], $spots[0]['spots'][$i]['fim'])}}</b> - {{ $spots[0]['spots'][$i]['local']}}</li>
				@endfor
			</ul>
	</div>
</div>