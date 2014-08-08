<div id="ultimasParadas" class="widget">
	<div class="title red"><i class="fa fa-check-square"></i><h2>Próximas Paradas</h2></div>
	<div class="body bordered">
		<?php $ids = [];?>
		@for($i=0;$i < count($spotsFuturos); $i++)
			<?php $ids[] = getID($spotsFuturos[$i][count($spotsFuturos[$i]) - 1]) ?>
			<ul class="truck-{{getID($spotsFuturos[$i][count($spotsFuturos[$i]) - 1])}}">
				<h3><a href="{{url()}}/truck/{{getSlugFromNome($spotsFuturos[$i][count($spotsFuturos[$i]) - 1])}}">{{ $spotsFuturos[$i][count($spotsFuturos[$i]) - 1] }}</a></h3>
				<div></div>
				@for ($b = 0; $b < (count($spotsFuturos[$i]) - 1); $b++)
					<li data-spot="{{$spotsFuturos[$i][$b]['id']}}"> <a href="{{url()}}/truck/{{getSlugFromNome($spotsFuturos[$i][count($spotsFuturos[$i]) - 1])}}"><b>{{dataSpotFront($spotsFuturos[$i][$b]['abertura'], $spotsFuturos[$i][$b]['inicio'])}}</b> - {{ $spotsFuturos[$i][$b]['local']}}</a></li>
				@endfor
			</ul>
		@endfor
		@for($i=0;$i < count($spots); $i++)
			@if(!in_array(getID($spots[$i][count($spots[$i]) - 1]), $ids))
			<ul class="truck-{{getID($spots[$i][count($spots[$i]) - 1])}}">
				<h3><a href="{{url()}}/truck/{{getSlugFromNome($spots[$i][count($spots[$i]) - 1])}}">{{ $spots[$i][count($spots[$i]) - 1] }}</a></h3>
				<div></div>
			</ul>
			@endif
		@endfor
	</div>
</div>