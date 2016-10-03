<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;


class HomeController extends Controller
{
    public function home()
    {	

    	return view('pages.content');
    }

    public function getSignUp()
    {	

    	return view('pages.sign-up');
    }

}
