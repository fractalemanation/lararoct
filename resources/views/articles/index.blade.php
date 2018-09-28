@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="{{route('article.create')}}" class="btn btn-primary">Создать</a>
		
		<hr>

		<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
		  <thead>
		    <tr>
		      <th data-toggle="true">Заголовок</th>
		      <th data-hide="phone">Кол-во комментариев</th>
		      <th class="text-right" data-sort-ignore="true">Действие</th>
		    </tr>
		  </thead>
		  <tbody>
		    @forelse ($articles as $article)
		      <tr>
		        <td>{{ $article->title }}</td>
		        <td>
		        	@isset ($article->comments)
		        	    {{$article->comments->count()}}
		        	@endisset
		        </td>
		        <td class="text-right">
		          <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('article.destroy', $article)}}" method="post">
		            <input type="hidden" name="_method" value="DELETE">
		            {{ csrf_field() }}
		            <div class="btn-group">
		            	<a class="btn btn-secondary" href="{{route('article.show', $article)}}">Просмотр</a>
		            	<a class="btn btn-primary" href="{{route('article.edit', $article)}}">Редактировать</a>
		            	<button type="submit" class="btn btn-danger">Удалить</button>
		            </div>
		          </form>
		        </td>
		      </tr>
		    @empty
		      <tr>
		        <td colspan="5" class="text-center">
		          <h2 class="ui center aligned icon header" class="center aligned">
		            <i class="circular database icon"></i>
		            Данные отсутствуют
		          </h2>
		        </td>
		      </tr>
		    @endforelse

		  </tbody>
		</table>
	</div>
@endsection