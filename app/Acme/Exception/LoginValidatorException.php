<?php

namespace Acme\Exception;

use Exception;

class LoginValidatorException extends Exception
{
	protected $errors;

	function __construct($message,$errors,$code=0,Exception $previous=null)
	{
		$this->errors=$errors;

		parent::__construct($message,$code,$previous);
	}

	public function getErrors()
	{
		return $this->errors;
	}
}