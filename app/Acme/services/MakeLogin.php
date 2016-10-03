<?php

namespace Acme\services;

use Acme\Validators\LoginValidator;

use Acme\Exception\LoginValidatorException;

use App\User;

/**
* User creator services
*/

class MakeLogin
{
	
	protected $validator;

	function __construct(LoginValidator $validator)

	{
		$this->validator=$validator;
	}

	public function make(array $attributes)
	{
		if ($this->validator->isValid($attributes)) {

			echo "login task";
			
			return true;
		}

		throw new LoginValidatorException('user login validation failed',$this->validator->getErrors());
		
	}
}