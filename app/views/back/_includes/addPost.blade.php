<div class="widget">
	<div class="title green">
		<h2>Adicionar Post</h2>
	</div>
	<div class="body bordered">
		{{Form::open(['route' => 'new_post_admin_path', 'class' => 'form', 'files' => true])}}

		{{Form::label('titulo', 'Título:')}}
		<div class="wrapInput">{{Form::text('titulo','',['placeholder' => 'Postagem marota'])}}</div>

		{{Form::label('body', 'Conteúdo:')}}
		<div class="wrapInput wrapTextarea">{{Form::textarea('body','',['placeholder' => 'Conteúdo legal'])}}</div>

		{{Form::label('imagem', 'Imagem em Publicação:')}}
		<div class="wrapInput">{{Form::file('imagem')}}</div>

		{{Form::label('publish_at', 'Data de Publicação:')}}
		<div class="wrapInput">{{Form::text('publish_at','',['placeholder' => '29/06/2014'])}}</div>

		{{Form::submit('Adicionar Post', ['class' => 'btn btn-green fr'] )}}
		{{Form::close()}}
	</div>
</div>