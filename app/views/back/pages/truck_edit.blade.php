@extends('back.layouts.default')

@section('content')
@include('back._includes.errors')
<div class="col-10">
	<div class="widget">
		<div class="title green">
			<h2>Editar Truck</h2>
		</div>
		<div class="body bordered">
			{{Form::model($data['truck'], ['files' => true, 'route' => ['edit_truck_admin_path', $data['truck']->id]])}}

			{{Form::label('nome', 'Nome do Food Truck:')}}
			<div class="wrapInput">{{Form::text('nome', $data['truck']->nome, ['placeholder' => 'Buzina Food Truck'])}}</div>

			{{Form::label('logo', 'Logo do Food Truck:')}}
			<div class="wrapInput">{{Form::file('logo','')}}</div>

			{{Form::label('especialidade', 'Especialidade:')}}
			<div class="wrapInput">{{Form::text('especialidade',$data['truck']->especialidade,['placeholder' => 'Comida Sólida'])}}</div>

			{{Form::label('cat_id', 'Escolha uma Categoria:')}}
			{{Form::select('cat_id', $data['categorias'], $data['truck']->cat_id)}}

			{{Form::label('mais_pedido', 'Mais Pedido:')}}
			<div class="wrapInput">{{Form::text('mais_pedido',$data['truck']->mais_pedido,['placeholder' => 'Hamburguer de Carne'])}}</div>

			{{Form::label('preco', 'Preço Médio:')}}
			<div class="wrapInput">{{Form::text('preco',$data['truck']->preco,['placeholder' => 'R$ 0,10 - R$ 100'])}}</div>

			{{Form::label('site', 'Site:')}}
			<div class="wrapInput">{{Form::text('site',$data['truck']->site,['placeholder' => 'http://foodtrucker.com.br'])}}</div>

			{{Form::label('facebook', 'Facebook:')}}
			<div class="wrapInput">{{Form::text('facebook',$data['truck']->facebook,['placeholder' => 'foodtruckerbr'])}}</div>

			{{Form::label('instagram', 'Instagram:')}}
			<div class="wrapInput">{{Form::text('instagram',$data['truck']->instagram,['placeholder' => 'foodtruckerbr'])}}</div>

			{{Form::label('servicos_0', 'Sobremesa:')}}
			<div class="wrapInput">Sim {{Form::radio('servicos_0','1', ($servicos[0] == '1' ? '1' : null ) )}}
				Não {{Form::radio('servicos_0','0', ($servicos[0] == '0' ? '1' : null ))}}</div>

			{{Form::label('servicos_1', 'Bebidas:')}}
			<div class="wrapInput">Sim {{Form::radio('servicos_1','1',($servicos[1] == '1' ? '1' : null ))}}
				Não {{Form::radio('servicos_1','0', ($servicos[1] == '0' ? '1' : null ))}}</div>

			{{Form::label('servicos_2', 'Música:')}}
			<div class="wrapInput">Sim {{Form::radio('servicos_2','1', ($servicos[2] == '1' ? '1' : null ) )}}
				Não {{Form::radio('servicos_2','0', ($servicos[2] == '0' ? '1' : null ))}}</div>

			{{Form::label('servicos_3', 'Cartão de Débito:')}}
			<div class="wrapInput">Sim {{Form::radio('servicos_3','1', ($servicos[3] == '1' ? '1' : null ) )}}
				Não {{Form::radio('servicos_3','0', ($servicos[3] == '0' ? '1' : null ))}}</div>

			{{Form::label('servicos_4', 'Cartão de Crédito:')}}
			<div class="wrapInput">Sim {{Form::radio('servicos_4','1', ($servicos[4] == '1' ? '1' : null ) )}}
				Não {{Form::radio('servicos_4','0', ($servicos[4] == '0' ? '1' : null ))}}</div>

			{{Form::label('servicos_5', 'Vale-Refeição:')}}
			<div class="wrapInput">Sim {{Form::radio('servicos_5','1', ($servicos[5] == '1' ? '1' : null ) )}}
				Não {{Form::radio('servicos_5','0', ($servicos[5] == '0' ? '1' : null ))}}</div>

			{{Form::label('tags', 'Tags:')}}
			{{Form::text('tags',$data['tags'],['placeholder' => 'sobremesa, bebida'])}}

			{{Form::label('description', 'Descrição:')}}
			<div class="wrapInput wrapTextarea">{{Form::textarea('description',$data['truck']->description,['placeholder' => 'Food Truck bem legal e cool!'])}}</div>

			{{Form::label('', 'Imagens do Truck:')}}
			<div class="wrapInput">{{Form::file('imagens_1','')}}</div>
			<div class="wrapInput">{{Form::file('imagens_2','')}}</div>
			<div class="wrapInput">{{Form::file('imagens_3','')}}</div>

			{{Form::submit('Editar Truck', ['class' => 'btn btn-green fr'] )}}
			{{Form::close()}}
		</div>
	</div>
</div>
<div class="col-10">
	<div class="widget">
		<div class="title yellow">
			<h2>Imagem Atual</h2>
		</div>
		<div class="body bordered">
			{{HTML::image($data['truck']->logo, '', ['style' => 'max-width:100%'])}}
			{{HTML::image($imagens[0], '', ['style' => 'max-width:100%'])}}
			{{HTML::image($imagens[1], '', ['style' => 'max-width:100%'])}}
			{{HTML::image($imagens[2], '', ['style' => 'max-width:100%'])}}
		</div>
	</div>
</div>
<input name="" type="hidden" id="parent_url" value="{{route('truck_admin_path')}}"/>
@stop
@section('scripts')
{{HTML::script('js/tag-it.min.js')}}
<script>
	$("#tags").tagit({
		fieldName: "tags",
		allowSpaces: true,
		tagSource: function(search, showChoices) {
			var that = this;
			console.log(search);
			$.ajax({
				url: "/js/tags/"+search.term,
				data: {q: search.term},
				success: function(choices) {
					showChoices(that._subtractArray(choices, that.assignedTags()));
				}
			});
		}
	});
</script>
@stop

@section('css')
{{HTML::style('http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css')}}
{{HTML::style('css/vendor/jquery.tagit.css')}}
@stop

