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

		{{Form::label('description', 'Descrição:')}}
		<div class="wrapInput wrapTextarea">{{Form::textarea('description','',['placeholder' => 'Food Truck bem legal e cool!'])}}</div>

		{{Form::label('pagamento', 'Formas de Pagamento:')}}
		<div class="wrapInput">{{Form::text('pagamento','',['placeholder' => 'Dinheiro, Cartão Visa ou Mastercard'])}}</div>

		{{Form::label('facebook', 'Facebook:')}}
		<div class="wrapInput">{{Form::text('facebook','',['placeholder' => 'foodtruckerbr'])}}</div>

		{{Form::label('instagram', 'Instagram:')}}
		<div class="wrapInput">{{Form::text('instagram','',['placeholder' => 'foodtruckerbr'])}}</div>

		{{Form::label('maisPedido', 'Mais Pedido:')}}
		<div class="wrapInput">{{Form::text('maisPedido','',['placeholder' => 'Hamburguer de Carne'])}}</div>

		{{Form::label('extras', 'Extras:')}}
		<div class="wrapInput wrapTextarea">{{Form::textarea('extras','',['placeholder' => 'Música hype.'])}}</div>

		{{Form::submit('Adicionar Truck', ['class' => 'btn btn-green fr'] )}}
		{{Form::close()}}
	</div>
</div>
