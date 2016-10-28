<?php

namespace Acme\services;

use Acme\Validators\UserValidator;

use Acme\Exception\ValidatorException;

use Illuminate\Http\Request;

use Acme\Commander\CommandBus;

use App\User;

	
class UserCreator
{
	
	protected $validator;

	protected $request;

	protected $commandbus;

	function __construct(UserValidator $validator,Request $request,CommandBus $commandbus)

	{
		$this->validator=$validator;

		$this->request=$request;

		$this->commandbus=$commandbus;
	}

	public function make(array $attributes)
	{
		
				if ($this->request->hasFile('photo')) {

					$file=$this->request->file('photo');

					$file_name=time()."_".str_random(10)."_".$file->getClientOriginalName();
					
					$file->move('image/profile_image/',$file_name);
				}
				else
				{
					$file_name=null;
				}
				

		if ($this->validator->isValid($attributes)) {

			User::create([

				'name' 				=>	$this->request->input('name'),

				'image_url' 		=>	!is_null($file_name) ? $file_name : '',

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
