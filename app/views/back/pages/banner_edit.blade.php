@extends('back.layouts.default')

@section('content')
@include('back._includes.errors')
<div class="col-10">
	<div class="widget">
		<div class="title green">
			<h2>Editar Banner</h2>
		</div>
		<div class="body bordered">
			{{Form::model($data['banner'], ['class' => 'form', 'files' => true, 'route' => ['edit_banner_admin_path', $data['banner']->id]])}}

			{{Form::label('body', 'Conteúdo do Banner:')}}
			<div class="wrapInput">{{Form::text('body',$data['banner']->body,['placeholder' => 'Feirinha Milagrosa'])}}</div>
			{{Form::label('url', 'Link do Banner:')}}
			<div class="wrapInput">{{Form::text('url',$data['banner']->url,['placeholder' => 'http://foodtrucker.com.br/trucks/abc'])}}</div>
			{{Form::label('status', 'Ativo:')}}
			<div class="wrapInput">Sim {{Form::radio('status','1', ($data['banner']->status == '1' ? '1' : null ) )}}
				Não {{Form::radio('status','0', ($data['banner']->status == '0' ? '1' : null ))}}</div>

			{{Form::submit('Editar Banner', ['class' => 'btn btn-green fr'] )}}
			{{Form::close()}}
		</div>
	</div>
</div>
<input name="" type="hidden" id="parent_url" value="{{route('config_admin_path')}}"/>
@stop
