@extends('layouts.app')

@section('content')
	<div class="container">
		<h3>Комментарий к статье: {{$comment->article->title or ''}}</h3>
		<form class="form-horizontal" action="{{route('comment.update', $comment)}}" method="post">
			{{method_field('PUT')}}
			{{csrf_field()}}
			<fieldset class="form-horizontal">
				<div class="form-group"><label class="col-sm-2 control-label">Описание:</label>
					<div class="col-sm-10"><textarea name="text" class="form-control">{{$comment->text or ''}}</textarea></div>
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2"><button class="btn btn-primary" type="submit">Сохранить</button></div>
				</div>
			</fieldset>
		</form>
	</div>
@endsection