@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Загрузка файла вариант 1</h1>
	<!--<form method="post" enctype="multipart/form-data" action="{{route('image.upload')}}">
		{{csrf_field()}}
		<div class="form-group">
			<input type="file" name="image">
		</div>
		<button class="btn btn-default" type="submit">Загрузка</button>
	</form>
	@isset($path)
	<br><img class="img-responsive" src="{{asset('/storage/'.$path)}}">
	@endisset-->
	<image-upload></image-upload>
</div>
@endsection