@extends('layout.master')
	@section('sign-up')
		<h1>Edit User</h1>

		<form role="form" action="{{ route('user-update') }}" method="post" enctype="multipart/form-data">

		  <div class="form-group">
		    <label for="email">Name:</label>
		    <input type="text" class="form-control" name="name" value="" >

		    <div class="">{{ $errors->first('name') }}</div>
		  </div>

		  	<div class="form-group">
			    <label for="photo">Upload a Photo:</label>
			    <input type="file" class="form-control" name="photo" id="photo" >

			    <div class="error">{{ $errors->first('photo') }}</div>
			</div>

		  <input type="hidden" name="_token" value="{{ Session::token() }}">

		  <button type="submit" class="btn btn-success">Update</button>
		</form>

	@stop