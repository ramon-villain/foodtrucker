<div id="ultimasParadas" class="widget">
	<div class="title red"><i class="fa fa-check-square"></i><h2>Próximas Paradas</h2></div>
	<div class="body bordered">
		@for($i=0;$i < count($spots); $i++)
			<ul>
				<h3>{{ $spots[$i][count($spots[$i]) - 1] }}</h3>
				@for ($b = 0; $b < (count($spots[$i]) - 1); $b++)
					<li> <b>{{dataSpotFront($spots[$i][$b]['abertura'], $spots[$i][$b]['inicio'])}}</b> - {{ $spots[$i][$b]['local']}}</li>
				@endfor
			</ul>
		@endfor
	</div>
</div>