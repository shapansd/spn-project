<?php

namespace Acme\Validators;

use Illuminate\Validation\Factory;


abstract class Validator
{
	protected $errors;
	protected $validator;

	function __construct(Factory $validator)
	{
		$this->validator = $validator;
	}


	public function isValid(array $attributes)
	{
		$v=$this->validator->make($attributes,static::$rules);

		if ($v->fails()) {
			
			$this->errors = $v->messages();

			return false;
		}

		return true;
	}

	public function getErrors()
	{
		return $this->errors;
	}
}