
@extends('layout.master')
	@section('content')
		@if(Session::has('info'))

			<div class="alert alert-info">{{ Session::get('info') }}</div>

		@endif
		
		<h1>Article list</h1><hr/>

		@foreach($articles as $article)

			<div class="well ">
				<strong><a href="{{ route('show',['slug' =>$article->slug ]) }}">{{ $article->title }} </a> </strong>
				<small><a href="">by {{ $article->user()->first()->name }}</a></small>
			</div>

		@endforeach

		{!! $articles->render() !!}

	@stop