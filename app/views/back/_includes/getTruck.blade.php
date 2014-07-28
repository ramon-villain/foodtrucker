<div class="widget">
	<div class="title yellow">
		<h2>Trucks Cadastrados</h2>
	</div>
	<div class="body bordered">
		<table class="table">
			<tr>
				<th style="padding: 13px;">#</th>
				<th>Nome</th>
				<th>Descrição</th>
			</tr>
			@foreach($data['trucks'] as $truck)
			<tr>
				<td><a href="truck/{{$truck->id}}/edit">{{$truck->id}}</td>
				<td>{{$truck->nome}}</td>
				<td>{{$truck->description}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>