<?php

namespace Acme\services;

use Acme\Validators\LoginValidator;

use Acme\Exception\LoginValidatorException;

use Illuminate\Http\Request;

use App\User;

use Auth;


class MakeLogin
{
	
	protected $validator;
	protected $request;

	function __construct(LoginValidator $validator,Request $request)

	{
		$this->validator=$validator;
		$this->request=$request;
	}

	public function make(array $attributes)
	{
		if ($this->validator->isValid($attributes)) {

			return true;
		}

		throw new LoginValidatorException('user login validation failed',$this->validator->getErrors());
		
	}
}