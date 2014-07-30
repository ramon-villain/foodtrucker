<div class="widget">
	<div class="title yellow">
		<h2>Posts Publicados</h2>
	</div>
	<div class="body bordered">
		<table class="table">
			<tr>
				<th style="padding: 13px;">#</th>
				<th>Título</th>
				<th>Data de Publicação</th>
			</tr>
			@foreach($data['posts'] as $post)
			<tr>
				<td><a href="post/{{$post->id}}/edit">{{$post->id}}</td>
				<td>{{$post->titulo}}</td>
				<td>{{$post->publish_at}}</td>
			</tr>
			@endforeach
		</table>
		<div style="width: 100%;text-align: center;">
			{{$data['posts']->links()}}
		</div>
	</div>
</div>