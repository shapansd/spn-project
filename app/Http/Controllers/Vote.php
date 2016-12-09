<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Article;

use Auth;

class Vote extends Controller
{
    public function upvote($slug)
    {
    	
    	$article=Article::where('slug',$slug)->first();

    	return Auth::user()->upvote($article);
    }

    public function downvote($slug)
    {
    	
    	$article=Article::where('slug',$slug)->first();

    	return Auth::user()->downvote($article);
    }
}
