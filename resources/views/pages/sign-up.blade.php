@extends('layout.master')
	@section('sign-up')

		<form role="form" action="{{ route('signUp') }}" method="post" enctype="multipart/form-data">

		  <div class="form-group">
		    <label for="email">Name:</label>
		    <input type="text" class="form-control" name="name" value="{{ old('name') }}" >

		    	<div class="">{{ $errors->register->first('name') }}</div>
		  </div>
			

		<div class="form-group">
		    <label for="photo">Upload a Photo:</label>
		    <input type="file" class="form-control" name="photo" id="photo" >
		    <div class="error">{{ $errors->register->first('photo') }}</div>
		</div>


		  <div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
		    <div class="error">{{ $errors->register->first('email') }}</div>
		  </div>

		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" class="form-control" name="password" id="pwd">
		    	<div class="error">{{ $errors->register->first('password') }}</div>
		  </div>


		  <div class="form-group">
		    <label for="pwd">Confirm Password:</label>
		    <input type="password" class="form-control" name="confirm-password" id="pwd">
		    <div class="error">{{ $errors->register->first('confirm-password') }}</div>
		  </div>

		  <input type="hidden" name="_token" value="{{ Session::token() }}">

		  <button type="submit" class="btn btn-default">Submit</button>
		</form>

	@stop