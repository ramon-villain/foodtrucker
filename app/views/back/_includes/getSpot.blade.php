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
		<td><a href="spots/{{$spot->id}}/edit">{{$spot->id}}</td>
		<td>{{$spot->truck}}</td>
		<td>{{$spot->abertura}} - {{$spot->inicio}}</td>
		<td>{{$spot->local}}</td>
		<td>{{$spot->active}}</td>
	</tr>
	@endforeach
</table>