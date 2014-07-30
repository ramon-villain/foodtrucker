<div class="widget">
	<div class="title green">
		<h2>Adicionar Post</h2>
	</div>
	<div class="body bordered">
		{{Form::open(['route' => 'new_post_admin_path', 'class' => 'form', 'files' => true])}}

		{{Form::label('title', 'Título:')}}
		<div class="wrapInput">{{Form::text('title','',['placeholder' => 'Postagem marota'])}}</div>

		{{Form::label('body', 'Conteúdo:')}}
		<div class="wrapInput wrapTextarea">{{Form::textarea('body','',['placeholder' => 'Conteúdo legal'])}}</div>

		{{Form::label('image', 'Imagem em Publicação:')}}
		<div class="wrapInput">{{Form::file('image')}}</div>

		{{Form::label('body', 'Data de Publicação:')}}
		<div class="wrapInput wrapTextarea">{{Form::textarea('body','',['placeholder' => 'Conteúdo legal'])}}</div>

		{{Form::submit('Adicionar Post', ['class' => 'btn btn-green fr'] )}}
		{{Form::close()}}
	</div>
</div>