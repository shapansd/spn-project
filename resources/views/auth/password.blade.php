@extends('layout.master')
    @section('password')
        <form method="POST" action="/password/email">
            {!! csrf_field() !!}

            <div class="form-group">
                Email
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Send Password Reset Link
                </button>
            </div>
        </form>
    @stop