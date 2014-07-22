<div class="widget">
	<div class="title green">
		<h2>Adicionar Tag</h2>
	</div>
	<div class="body bordered">
		{{Form::open(['route' => 'new_tag_admin_path', 'class' => 'form'])}}

		{{Form::label('newTag', 'Tag:')}}
		{{Form::text('newTag','',['placeholder' => 'mexicano'])}}

		{{Form::submit('Adicionar Tag', ['class' => 'btn btn-green fr'] )}}
		{{Form::close()}}
	</div>
</div>