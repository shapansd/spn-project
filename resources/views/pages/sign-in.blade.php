@extends('layout.master')

	@section('sign-in')

		<form role="form" action="{{ route('login') }}" method="post">

		  <div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
			
			@if($errors->login->has('email'))
				<div class="error">{{ $errors->login->first('email') }}</div>
			@endif

		  </div>

		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" class="form-control" name="password" id="pwd">

		    @if($errors->login->has('password'))
				<div class="error">{{ $errors->login->first('password') }}</div>
			@endif
		  </div>

		  <div class="checkbox">
		    <label><input type="checkbox"> Remember me</label>
		  </div>

		  <input type="hidden" name="_token" value="{{ Session::token() }}">

		  <button type="submit" class="btn btn-default">Submit</button>
		</form>

	@stop