<div class="widget">
	<div class="title green">
		<h2>Adicionar Evento</h2>
	</div>
	<div class="body bordered">
		{{Form::open(['route' => 'new_evento_admin_path', 'class' => 'form', 'files' => true])}}

		{{Form::label('nome', 'Nome do Evento:')}}
		<div class="wrapInput">{{Form::text('nome','',['placeholder' => 'Feirinha de comidinhas'])}}</div>

		{{Form::label('local', 'Local do Evento:')}}
		<div class="wrapInput">{{Form::text('local','',['placeholder' => 'Avenida Paulista, 800, São Paulo'])}}</div>

		{{Form::label('imagem', 'Imagem do Evento:')}}
		<div class="wrapInput">{{Form::file('imagem')}}</div>

		{{Form::label('data', 'Dia do Evento:')}}
		<div class="wrapInput">{{Form::text('data','',['placeholder' => '2014-06-29'])}}</div>

		{{Form::label('description', 'Descrição do Evento:')}}
		<div class="wrapInput wrapTextarea">{{Form::textarea('description','',['placeholder' => 'Muita comida e gente legal', 'class' => 'editor'])}}</div>

		{{Form::submit('Adicionar Evento', ['class' => 'btn btn-green fr'] )}}
		{{Form::close()}}
	</div>
</div>