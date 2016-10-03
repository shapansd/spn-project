<?php

namespace Acme\services;

use Acme\Validators\UserValidator;

use Acme\Exception\ValidatorException;

use Illuminate\Http\Request;

use App\User;

/**
* User creator services
*/

class UserCreator
{
	
	protected $validator;

	protected $request;

	function __construct(UserValidator $validator,Request $request)

	{
		$this->validator=$validator;

		$this->request=$request;
	}

	public function make(array $attributes)
	{
		if ($this->validator->isValid($attributes)) {

			User::create([

				'name' 				=>	$this->request->input('name'),
				'email'				=>	$this->request->input('email'),
				'password' 			=>	bcrypt($this->request->input('password')),
				'confirmation_code'	=>	str_random(10),
				'confirmed'			=>	0,
			]);

			return true;
		}

		throw new ValidatorException('usercreator validation failed',$this->validator->getErrors());
		
	}
}