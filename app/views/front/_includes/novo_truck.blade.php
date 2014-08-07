<div id="trucksNovos" class="widget">
	<div class="title blue"><i class="fa fa-trophy"></i><h2>Trucks Novos</h2></div>
	<div class="body">
		<a href="{{url()}}/truck/{{$last_truck->slug}}">{{ HTML::image($imagens[0]) }}</a>
		<h3>{{$last_truck->nome}}</h3>
	</div>
</div>