<div id="ultimasParadas" class="widget">
	<div class="title red"><i class="fa fa-check-square"></i><h2>Próximas Paradas</h2></div>
	<div class="body bordered">
		@for($i=0;$i < count($spots); $i++)
			<ul>
				<h3>{{ $spots[$i]['nome'] }}</h3>
				@for ($b = 0; $b < count($spots[$i]['spots']); $b++)
					<li> <a href="{{url()}}/truck/{{$spots[$i]['slug']}}"><b>{{dataSpotFront($spots[$i]['spots'][$b]['abertura'], $spots[$i]['spots'][$b]['inicio'], $spots[$i]['spots'][$b]['fim'])}}</b> - {{ $spots[$i]['spots'][$b]['local']}}</a></li>
				@endfor
			</ul>
		@endfor
	</div>
</div>