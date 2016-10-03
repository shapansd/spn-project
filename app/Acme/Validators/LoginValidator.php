<?php

namespace Acme\Validators;


class LoginValidator extends Validator
{
	

	protected static $rules=[
        'email' =>'required|email',
        'password'  =>'required|min:6',
	];
}