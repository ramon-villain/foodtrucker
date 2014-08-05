<div class="busca {{$formClass}}">
	{{Form::open(['route' => 'search_path', 'method' => 'get'])}}
		<i class="fa fa-search"></i>
		{{Form::text('q','', array('class'=>'form-menu', 'placeholder' => 'BUSCA…'))}}
	{{Form::close()}}
</div>