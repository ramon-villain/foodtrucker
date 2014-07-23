<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Recortar Imagem</h4>
			</div>
			<div class="modal-body">
				{{HTML::image($data['imagemSlider'],'', ['id'=> 'slider'])}}
				{{Form::open(['route' => 'crop_upload_banner', 'files'=> 'true', 'onsubmit' => 'return checkCoords();'])}}
				<input type="hidden" id="src" name="src" value="{{$data['imagemSlider'] or 'a'}}" />
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
		<h2>Adicionar Banner</h2>
	</div>
	<div class="body bordered">
		{{Form::open(['route' => 'banner_upload', 'files'=> 'true', 'class' => 'form'])}}
		{{Form::label('body', 'Conteúdo do Banner:')}}
		<div class="wrapInput">{{Form::text('body','',['placeholder' => 'Feirinha Milagrosa'])}}</div>
		{{Form::label('url', 'Link do Banner:')}}
		<div class="wrapInput">{{Form::text('url','',['placeholder' => 'http://foodtrucker.com.br/trucks/abc'])}}</div>
		{{Form::label('image', 'Imagem em Destaque:')}}
		{{Form::file('image')}}
		{{Form::submit('Atualizar Destaque', ['class' => 'btn btn-green fr'] )}}
		{{Form::close()}}
	</div>
</div>