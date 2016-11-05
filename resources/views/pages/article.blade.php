@extends('layout.master')
	@section('post-article')
		<form role="form" action="{{ route('post_article') }}" method="post">

		  <div class="form-group" >

		    <label for="title">Article title</label>

		    <input type="text" class="form-control" id="title" name="title">

		  </div>

		<div class="form-group">

			<label for="body">body:</label>

			<textarea class="form-control" rows="5" id="" name="body"></textarea>

		</div>

			<input type="hidden" name="_token" value="{{ Session::token() }}">
			<button type="submit" class="btn btn-success">Submit</button>
		</form>
		
		<script>

			initSample();

		</script>

	@stop

