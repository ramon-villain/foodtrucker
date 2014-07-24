@if($errors->any())
	@foreach($errors->all() as $error)
		<script>alert('{{$error}}')</script>
	@endforeach
@endif