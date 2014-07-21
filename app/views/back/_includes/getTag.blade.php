<h2>Tags Cadastradas</h2>
<table class="table">
	<tr>
		<th style="padding: 13px;">#</th>
		<th>Tag</th>
	</tr>
	@foreach($data['tagsPaginated'] as $tag)
	<tr>
		<td><a href="tags/{{$tag->id}}/edit">{{$tag->id}}</td>
		<td>{{$tag->tag}}</td>
	</tr>
	@endforeach
</table>
<div style="width: 100%;text-align: center;">
{{$data['tagsPaginated']->links()}}
</div>