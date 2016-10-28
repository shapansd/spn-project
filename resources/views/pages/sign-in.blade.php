@extends('layout.master')

	@section('sign-in')

		<form role="form" action="{{ route('login') }}" method="post">
		
			@if(Session::has('login-error'))
				<div class="alert alert-info">{{ Session::get('login-error') }}</div>
			@endif

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
		    <label><input type="checkbox" name="remember"> Remember me</label>
		  </div>
		  
		  <div class="form-group">
		  	<p> <a href="{{ url('password/email/') }}">Click here to reset your password:</a></p>
		  </div>

		  <input type="hidden" name="_token" value="{{ Session::token() }}">

		  <button type="submit" class="btn btn-default">Submit</button>
		</form>

	@stop