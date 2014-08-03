<div class="widget">
	<div class="title yellow">
		<h2>Eventos Cadastradas</h2>
	</div>
	<div class="body bordered">
		<table class="table">
			<tr>
				<th style="padding: 13px;">#</th>
				<th>Nome</th>
				<th>Data</th>
			</tr>
			@foreach($data['eventos'] as $evento)
			<tr>
				<td><a href="eventos/{{$evento->id}}/edit">{{$evento->id}}</td>
				<td>{{$evento->nome}}</td>
				<td>{{$evento->data}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>