<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Article;

use App\Rate;

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

        $article->increment('view_count');
        $plus=Rate::plus($article->id);
        $minus=Rate::minus($article->id);
      return view('pages.article-body',compact('article','plus','minus'));
    }

    public function edit($slug)
    {
      return 'updated';
      Article::where('slug',$slug)->update();
      return redirect()->back();
    }


    public function delete($slug)
    {
      Article::where('slug',$slug)->delete();
      return redirect()->back();
    }
}
