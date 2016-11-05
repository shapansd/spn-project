<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Acme\Exception\ValidatorException;

use Acme\Exception\LoginValidatorException;

use Acme\services\UserCreator;

use Acme\services\MakeLogin;

use Acme\Commander\command\EmailCommand;

use Acme\Commander\CommandBus;

use App\Http\Requests\requestUpdate;

use Auth;

use App\User;


class UserController extends Controller
{
    protected $request;

    protected $validator;

    protected $makeLogin;


    function __construct(Request $request,UserCreator $validator,
        MakeLogin $makeLogin,CommandBus $commandbus)
    {
        $this->request = $request;
        $this->validator=$validator;
    	$this->makeLogin = $makeLogin;
        $this->commandbus =$commandbus;
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

            //command bus system
            
            $this->commandbus->execute(new EmailCommand);

            return redirect()->route('home')
                            ->with('Info','Thank u for your signUP,check email to activate');

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

                if(Auth::attempt([

                    'email' => $this->request->input('email'), 
                    'password' => $this->request->input('password')
                    
                ],$this->request->remember)) return redirect()->route('dashboard');


            return redirect()->back()->with('login-error','UserName or Password wrong');

        } catch (LoginValidatorException $e) {
            
            return redirect()->back()->withInput()
                                    ->withErrors($e->getErrors(),'login');
        }
    }


    public function confirmUser($confirmation_code)
    {
        $user_code=Auth::user()->confirmation_code;

        if ($user_code == $confirmation_code) {
            
            $user=Auth::user();
            $user->update([
                'confirmed'         =>1,
                'confirmation_code' =>'',
            ]);

            return redirect()->route('home')->with('Info','U are now activated');
        }

        echo "404 Page";
    }


    public function signOut()
    {
        Auth::logout();

        return redirect('login');
    }

    public function userDashboard()
    {
        return view('pages.user-dashboard');
    }

    public function userEdit($id)
    {
        $user=User::find($id);

        return view('pages.edit-user',compact('user'));
    }

    public function userUpdate(requestUpdate $request)
    {
       $user=Auth::user();

            if ($request->hasFile('photo')) {

                    $file=$request->file('photo');

                    $file_name=time()."_".str_random(10)."_".$file->getClientOriginalName();
                    
                    $file->move('image/profile_image/',$file_name);
                }
            else
                {
                    $file_name=null;
                }

        $user->update([

            'name'  =>$this->request->input('name'),

            'image_url' => !is_null($file_name) ? $file_name : '',
        ]);

        return redirect()->route('dashboard')
                            ->with('Info','Your data has been updated');
    var_dump('updated');
     }

     public function admin()
     {
         if (Auth::user()->hasRole('admin')) {
             
             return 'you are the admin page';
         }

         return redirect('/');
     }
}
