<div id="ultimasParadas" class="widget">
	<div class="title red"><i class="fa fa-check-square"></i><h2>Próximas Paradas</h2></div>
	<div class="body bordered">
		<?php
		$ids = [];
		$spotsget = [];
		$id_hoje = [];
		$resto = [];
		?>
		@for($a=0;$a < count($spots); $a++)
		<?php $id_hoje[] = getID($spots[$a][count($spots[$a]) - 1])?>
		@endfor

		@for($b=0;$b < count($spotsFuturos); $b++)
		<?php $ids[] = getID($spotsFuturos[$b][count($spotsFuturos[$b]) - 1]) ?>
		@for ($c = 0; $c < (count($spotsFuturos[$b]) - 1); $c++)
		@if (in_array($spotsFuturos[$b][$c]['truck_id'], $id_hoje))
		<?php $spotsget[] = $spotsFuturos[$b][$c];?>
		@else
		<?php $resto[] = $spotsFuturos[$b][$c];?>
		@endif
		@endfor
		@endfor

		@for($d=0;$d < count($spots); $d++)
		<ul class="truck-{{getID($spots[$d][count($spots[$d]) - 1])}}">
			<h3><a href="{{url()}}/truck/{{getSlugFromNome($spots[$d][count($spots[$d]) - 1])}}">{{ $spots[$d][count($spots[$d]) - 1] }}</a></h3>
			<div></div>
			@for ($e = 0; $e < count($spotsget); $e++)
				@if (getID($spots[$d][count($spots[$d]) - 1]) == $spotsget[$e]['truck_id'])
					<li data-spot="{{$spotsget[$e]['id']}}"> <a href="{{url()}}/truck/{{getSlugFromNome($spotsFuturos[$d][count($spotsFuturos[$d]) - 1])}}"><b>{{dataSpotFront($spotsget[$e]['abertura'], $spotsget[$e]['inicio'], $spotsget[$e]['fim'])}}</b> - {{ $spotsget[$e]['local']}}</a></li>
				@endif
			@endfor
		</ul>
		@endfor
		@for($h=0;$h < count($spotsFuturos); $h++)
		@if (!in_array(getID($spotsFuturos[$h][count($spotsFuturos[$h]) - 1]), $id_hoje))
		<ul class="truck-{{getID($spotsFuturos[$h][count($spotsFuturos[$h]) - 1])}}">
			<h3><a href="{{url()}}/truck/{{getSlugFromNome($spotsFuturos[$h][count($spotsFuturos[$h]) - 1])}}">{{ $spotsFuturos[$h][count($spotsFuturos[$h]) - 1] }}</a></h3>
			@for ($i = 0; $i < (count($spotsFuturos[$h]) - 1); $i++)
			<li data-spot="{{$spotsFuturos[$h][$i]['id']}}"> <a href="{{url()}}/truck/{{getSlugFromNome($spotsFuturos[$h][count($spotsFuturos[$h]) - 1])}}"><b>{{dataSpotFront($spotsFuturos[$h][$i]['abertura'], $spotsFuturos[$h][$i]['inicio'], $spotsFuturos[$h][$i]['fim'])}}</b> - {{ $spotsFuturos[$h][$i]['local']}}</a></li>
			@endfor
		</ul>
		@endif
		@endfor
	</div>
</div>