<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Acme\Exception\ValidatorException;

use Acme\Exception\LoginValidatorException;

use Acme\services\UserCreator;

use Acme\services\MakeLogin;


class UserController extends Controller
{
    protected $request;

    protected $validator;

    protected $makeLogin;


    function __construct(Request $request,UserCreator $validator,MakeLogin $makeLogin)
    {
        $this->request = $request;
        $this->validator=$validator;
    	$this->makeLogin = $makeLogin;
    }

	public function getSignUp()

    {	
    	return view('pages.sign-up');
    }

    public function postSignUp()

    {	

        try {

            $data=$this->request->all();

            $this->validator->make($data);

            return redirect()->route('home');

        } catch(\Acme\Exception\ValidatorException $e){

            return redirect()->back()->withInput()
                                    ->withErrors($e->getErrors(),'register');
        }

    }

    public function getSignIn()
    {	

    	return view('pages.sign-in');
    }

    public function postSignIn()
    {	
        try {
                $data=$this->request->all();

                $this->makeLogin->make($data);

                return redirect()->route('home');

        } catch (LoginValidatorException $e) {
            
            return redirect()->back()->withInput()
                                    ->withErrors($e->getErrors(),'login');
        }
    }
}
