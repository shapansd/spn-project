<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Article;

class ArticleController extends Controller
{
   	
   	protected $request;

   	function __construct(Request $request)
   	{
   		$this->request = $request;
   	}
   	public function getArticle()
    {
    	return view('pages.article');
    }


    public function postArticle()
    {
    	//$data=strip_tags($this->request->input('body'),'<h1><b>');

      Article::create([

        'title'   =>$this->request->input('title'),
        'slug'   =>str_slug($this->request->input('title')),
        'body'   =>$this->request->input('title'),
        'user_id' =>Auth::user()->id,
      ]);

      return redirect()->route('home')
                    ->with('info','a new article has been created');
    }

    public function show($slug)
    {
      $article=Article::where('slug',$slug)->first();

      if (!$article) {

        return 'oops';
        
      }

      var_dump($article->body);
    }
}