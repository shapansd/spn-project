@extends('layout.master')
@section('reset')
    <form method="POST" action="/password/reset">
        {!! csrf_field() !!}
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">
                Reset Password
            </button>
        </div>
    </form>
@stop