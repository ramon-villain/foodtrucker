@if($errors->any())
<div class="alert">
	<ul>
		<?php $erros = []?>
		@foreach($errors->all() as $error)
		<?php $erros[] = $error;?>
		@endforeach
		@if (count($erros) == 1)
		<li>O campo <b>{{$erros[0]}}</b> é obrigatório. <span class="close">x</span></li>
		@elseif (count($erros) == 2)
		<li>Os campos <b>{{$erros[0]}}</b> e <b>{{$erros[1]}}</b> são obrigatórios. <span class="close">x</span></li>
		@else
		<li>Os campos
			@for($i=0; $i<(count($erros) - 1); $i++) <b>{{$erros[$i]}}, </b> @endfor
			<b>{{$erros[count($erros) - 1]}}</b> são obrigatórios. <span class="close">x</span></li>
		@endif
	</ul>
</div>
@endif