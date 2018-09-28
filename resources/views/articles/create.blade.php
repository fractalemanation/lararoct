@extends('layouts.app')

@section('content')

	<div class="container">
		<form class="form-horizontal" action="{{route('article.store') }}" method="post">
		  {{ csrf_field() }}
			<fieldset class="form-horizontal">
			  <div class="form-group"><label class="col-sm-2 control-label">Заголовок:</label>
			    <div class="col-sm-10">
			      <input type="text" name="title" class="form-control" placeholder="" value="{{$article->title or ''}}">
			    </div>
			  </div>
			  <div class="form-group"><label class="col-sm-2 control-label">Описание:</label>
			    <div class="col-sm-10">
			      <input type="text" name="description" class="form-control" placeholder="" value="{{$article->description or ''}}">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-4 col-sm-offset-2">
			      <button class="btn btn-primary" type="submit">Сохранить</button>
			    </div>
			  </div>
		  	</fieldset>
		</form>
	</div>

@endsection