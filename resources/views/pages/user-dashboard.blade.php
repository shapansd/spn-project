@extends('layout.master')
	@section('user-dashboard')

		@if(Auth::check())


			@if(Session::has('Info'))
				<div class="alert alert-info">{{ Session::get('Info') }}</div>
			@endif
			
			<h1>{{ Auth::user()->name }}</h1><span>

			@if(Auth::user()->hasRole('admin'))
				<p>{{ Auth::user()->role->name }}</p>
			@endif

			<div class="">
				<img src="{{ asset('image/profile_image/'.Auth::user()->image_url )  }}" alt="" style="width:304px;height:228px;">
			</div>

			<div class="row">
				<a href="{{ route('user-edit',['id' =>Auth::user()->id]) }}" class="well">edit</a>
			</div>

			<h1>Article that you have created</h1>

			<hr/>

			@if(Auth::user()->articles()->count() > 1)

				@foreach(Auth::user()->articles()->get() as $article)

					<div class="well">
						<a href="">{{ $article->title }}</a>
					</div>

				@endforeach

			@else
				<div class="well">{{ Auth::user()->articles()->first()->title }}</div>

			@endif

		@endif
		
	@stop