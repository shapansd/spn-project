<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;


class HomeController extends Controller
{
    public function home()
    {	

    	$articles=Article::paginate(4);

    	return view('pages.content',compact('articles'));
    }

    public function getSignUp()
    {	

    	return view('pages.sign-up');
    }

}
