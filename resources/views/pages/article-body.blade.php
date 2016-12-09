

@extends('layout.master')
	@section('article-body')
		<h1>Article</h1><hr/>
		<ul>
			<li>like :: {{ $article->votes->where('vote',1)->count() }}</li>
			<li>dislike ::{{ $article->votes->where('down',1)->count() }}</li>
			<li>
				<form action="{{ route('up',$article->slug) }}" method="POST">

					<button class="btn btn-success">up</button>
					<input type="hidden" name="_token" value="{{ Session::token() }}">
				</form>

				<form action="{{ route('down',$article->slug) }}" method="POST">

					<button class="btn btn-danger">down</button>

					<input type="hidden" name="_token" value="{{ Session::token() }}" >

				</form>
				
			</li>

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