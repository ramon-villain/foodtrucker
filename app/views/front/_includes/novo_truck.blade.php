<div id="trucksNovos" class="widget">
	<div class="title red"><img src="{{url()}}/images/ic_truck.png" style="position: relative;top: -13px;margin-right: 3px;"/><h2>Trucks Novos</h2></div>
	<div class="body" style="height: 244px;">
		<a href="{{url()}}/truck/{{$last_truck->slug}}">{{ HTML::image($imagens[0], '', ['style' => 'height:244px']) }}</a>
		<h3>{{$last_truck->nome}}</h3>
	</div>
</div>