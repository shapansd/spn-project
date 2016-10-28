<?php

namespace Acme\Validators;


class UserValidator extends Validator
{
	

	protected static $rules=[

		'name'  	=>'required|min:4',
        'email'     =>'required|email|unique:users',
        'photo'		=>'required',
        'password'  =>'required|min:6',
	];
}