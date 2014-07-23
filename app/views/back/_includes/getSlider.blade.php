<div class="widget">
	<div class="title yellow">
		<h2>Banners Cadastradas</h2>
	</div>
	<div class="body bordered">
		<table class="table">
			<tr>
				<th style="padding: 13px;">#</th>
				<th>Título</th>
				<th>URL</th>
				<th>Ativo</th>
			</tr>
			@foreach($sliders as $slider)
			<tr>
				<td><a href="sliders/{{$slider->id}}/edit">{{$slider->id}}</td>
				<td>{{$slider->body}}</td>
				<td>{{$slider->url}}</td>
				<td>@if($slider->status == '1')Sim @else Não @endif</td>
			</tr>
			@endforeach
		</table>
		{{link_to_route('add_banner_path', 'Adicionar Banner', null , ['class' => 'btn btn-green fr'])}}
	</div>
</div>