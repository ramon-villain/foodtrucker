<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Recortar Imagem</h4>
			</div>
			<div class="modal-body">
				{{HTML::image($data['imagemDestaque'],'', ['id'=> 'featured'])}}
				{{Form::open(['route' => 'crop_upload_image', 'files'=> 'true', 'onsubmit' => 'return checkCoords();'])}}
				<input type="hidden" id="src" name="src" value="{{$data['imagemDestaque'] or 'a'}}" />
				<input type="hidden" id="x" name="x" />
				<input type="hidden" id="y" name="y" />
				<input type="hidden" id="w" name="w" />
				<input type="hidden" id="h" name="h" />
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-green">Salvar</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="widget">
	<div class="title green">
		<h2>Em Destaque</h2>
	</div>
	<div class="body bordered">
		{{Form::open(['route' => 'featured_upload', 'files'=> 'true', 'class' => 'form'])}}
		{{Form::label('title', 'Título do Destaque:')}}
		<div class="wrapInput">{{Form::text('title',$featured->title,['placeholder' => 'Foodtruck da Semana'])}}</div>
		{{Form::label('body', 'Conteúdo do Destaque:')}}
		<div class="wrapInput">{{Form::text('body',$featured->body,['placeholder' => 'La Buena Station'])}}</div>
		{{Form::label('image', 'Imagem em Destaque:')}}
		@if($featured->image != '')
		{{HTML::image($featured->image, '',['style' => 'margin-bottom:20px'])}}
		@endif
		{{Form::file('image')}}
		{{Form::hidden('image_bckp', $featured->image)}}
		{{Form::submit('Atualizar Destaque', ['class' => 'btn btn-green fr'] )}}
		{{Form::close()}}
	</div>
</div>