@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="{{route('article.index')}}" class="btn btn-primary">Назад</a>
		<hr>
		<h1>{{$article->title or ''}}</h1>
		<p>{{$article->description or ''}}</p>
		<hr>
		@forelse ($article->comments as $comment)
			<div class="alert alert-primary" role="alert">
				{{$comment->text or ''}}
				<p class="mb-0">
					<a class="btn btn-primary" href="{{route('comment.edit', $comment)}}">Редактировать</a>
				</p>
			</div>
		@empty
			<h3 class="text-center">Комментариев нет</h3>
		@endforelse
		<form class="form-horizontal" action="{{route('comment.store')}}" method="post">
			<input type="hidden" name="article_id" value="{{$article->id or ''}}">
			{{csrf_field()}}
			<fieldset class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-1 control-label">Комментарий:</label>
					<div class="col-sm-12">
						<textarea name="text" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4">
						<button class="btn btn-primary" type="submit">Опубликовать</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
@endsection