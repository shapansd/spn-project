

@extends('layout.master')
	@section('article-body')
		<h1>Article</h1><hr/>
		<ul>
			@if(Auth::check() && Auth::user()->liked($article->id))
				<p>yeah u liked it</p>
			@else
				<p>u havent liked</p>
			@endif
			<li>like :: {{ $plus }}</li>
			<li>dislike ::{{ $minus }}</li>

		</ul>

		<h2 class="well"> {{ $article->title }} </h2>|<small>{{ $article->created_at->diffForHumans() }}</small>
		<p class="jumbotron">{{ $article->body }}</p><hr>

		<h1>comment</h1><hr>

			@foreach($article->comments as $comment)
				<p class="info">author of this comment:: {{ $comment->user()->first()->name }}</p>
				<p class="well">{{ $comment->body }}</p>

					@foreach($comment->replies as $reply)
						<strong>reply by {{ $reply->user->name }} ::</strong><br>
						<small>{{ $reply->body }}</small><br>
					@endforeach

				<hr>
			@endforeach

		<div class="col-md-8">
			<h3>make comment<h3><hr>

			<form>
				<textarea name="cm-body"></textarea>

				<input type="submit" class="btn btn-success">
			</form>
		</div>
	@stop