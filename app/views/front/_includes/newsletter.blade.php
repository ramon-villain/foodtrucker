{{ Form::open(['route' => 'newsletter_path', 'class' => 'form red widget', 'id' => 'newsletter']) }}
	<h2><i class="fa fa-envelope-o" style="font-size: 18px;position:relative;top: -1px;"></i>Assine nossa newsletter</h2>
	<div class="wrapInput">{{ Form::email('email', '', ['placeholder' => 'email@exemplo.com', 'required' => 'required']) }}</div>
	{{ Form::submit('OK', ['class' => 'text-btn']) }}
{{ Form::close() }}