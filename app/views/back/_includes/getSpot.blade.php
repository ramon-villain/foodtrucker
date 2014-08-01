<div class="widget">
	<div class="title yellow">
		<h2>Spots Cadastrados</h2>
	</div>
	<div class="body bordered">
		<table class="table">
			<tr>
				<th style="padding: 13px;">#</th>
				<th>Truck</th>
				<th>Abertura</th>
				<th>Endereço</th>
				<th>Ativo</th>
			</tr>
			@foreach($data['spots'] as $spot)
			<tr>
				<td><a href="spot/{{$spot->id}}/edit">{{$spot->id}}</td>
				<td>{{$spot->truck_id}}</td>
				<td>{{$spot->abertura}} - {{$spot->inicio}}</td>
				<td>{{$spot->local}}</td>
				<td>{{$spot->active}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>