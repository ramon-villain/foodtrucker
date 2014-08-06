<div class="widget">
	<div class="title green">
		<h2>Adicionar Truck</h2>
	</div>
	<div class="body bordered">
		{{Form::open(['route' => 'new_truck_admin_path', 'class' => 'form', 'files' => true])}}
		{{Form::label('nome', 'Nome do Food Truck:')}}
		<div class="wrapInput">{{Form::text('nome', '', ['placeholder' => 'Buzina Food Truck'])}}</div>

		{{Form::label('logo', 'Logo do Food Truck:')}}
		<div class="wrapInput">{{Form::file('logo','')}}</div>

		{{Form::label('especialidade', 'Especialidade:')}}
		<div class="wrapInput">{{Form::text('especialidade','',['placeholder' => 'Comida Sólida'])}}</div>

		{{Form::label('cat_id', 'Escolha uma Categoria:')}}
		{{Form::select('cat_id', $data['categorias'])}}

		{{Form::label('mais_pedido', 'Mais Pedido:')}}
		<div class="wrapInput">{{Form::text('mais_pedido','',['placeholder' => 'Hamburguer de Carne'])}}</div>

		{{Form::label('preco', 'Preço Médio:')}}
		<div class="wrapInput">{{Form::text('preco','',['placeholder' => 'R$ 0,10 - R$ 100'])}}</div>

		{{Form::label('site', 'Site:')}}
		<div class="wrapInput">{{Form::text('site','',['placeholder' => 'http://foodtrucker.com.br'])}}</div>

		{{Form::label('facebook', 'Facebook:')}}
		<div class="wrapInput">{{Form::text('facebook','',['placeholder' => 'foodtruckerbr'])}}</div>

		{{Form::label('instagram', 'Instagram:')}}
		<div class="wrapInput">{{Form::text('instagram','',['placeholder' => 'foodtruckerbr'])}}</div>

		{{Form::label('servicos_0', 'Sobremesa:')}}
		<div class="wrapInput">Sim {{Form::radio('servicos_0','1' )}}
			Não {{Form::radio('servicos_0','0', true)}}</div>

		{{Form::label('servicos_1', 'Bebidas:')}}
		<div class="wrapInput">Sim {{Form::radio('servicos_1','1' )}}
			Não {{Form::radio('servicos_1','0', true)}}</div>

		{{Form::label('servicos_2', 'Música:')}}
		<div class="wrapInput">Sim {{Form::radio('servicos_2','1' )}}
			Não {{Form::radio('servicos_2','0', true)}}</div>

		{{Form::label('servicos_3', 'Cartão de Débito:')}}
		<div class="wrapInput">Sim {{Form::radio('servicos_3','1' )}}
			Não {{Form::radio('servicos_3','0', true)}}</div>

		{{Form::label('servicos_4', 'Cartão de Crédito:')}}
		<div class="wrapInput">Sim {{Form::radio('servicos_4','1' )}}
			Não {{Form::radio('servicos_4','0', true)}}</div>

		{{Form::label('servicos_5', 'Vale-Refeição:')}}
		<div class="wrapInput">Sim {{Form::radio('servicos_5','1' )}}
			Não {{Form::radio('servicos_5','0', true)}}</div>

		{{Form::label('tags', 'Tags:')}}
		{{Form::text('tags','',['placeholder' => 'sobremesa, bebida'])}}

		{{Form::label('description', 'Descrição:')}}
		<div class="wrapInput wrapTextarea">{{Form::textarea('description','',['placeholder' => 'Food Truck bem legal e cool!'])}}</div>

		{{Form::label('', 'Imagens do Truck:')}}
		<div class="wrapInput">{{Form::file('imagens_1','')}}</div>
		<div class="wrapInput">{{Form::file('imagens_2','')}}</div>
		<div class="wrapInput">{{Form::file('imagens_3','')}}</div>

		{{Form::submit('Adicionar Truck', ['class' => 'btn btn-green fr'] )}}
		{{Form::close()}}
	</div>
</div>
