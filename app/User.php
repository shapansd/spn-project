<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role;

use App\Article;

use App\comment;

use App\Vote;

use App\Rate;

class User extends Authenticatable
{
 

 
    protected $fillable = [
        'name', 'email', 'password','confirmation_code','confirmed','image_url'
    ];



    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }


    public  function hasRole($name)
    {
        
        foreach($this->roles as $role) {
            
            if($role->name == $name)
            {
                return true;
            }
        }

        return false;
    }


    public function Articles()
    {
        return $this->hasMany(Article::class);
    }

    public function comments()
    {
        return $this->hasMany(comment::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }



    function ifVoted($article)
    {
        if ($this->id === $article->votes->first()->user_id) {
            
            return true;
        }

            return false;
    }

    public function vote($article)
    {
        if (false) {
            
            if ($this->votes->where('article_id',$article->id)->first()->down == 1) {
                
                return 'you are liked it';
            }

            return "you are disliked";
        }

        return "yhavent voted yet";
    }

//here is a code snippet of upvote

    public function upvote($article)
    {
        if ($this->ifVoted($article)) {
            
            if ($this->votes->where('article_id',$article->id)->first()->vote == 1) {
                
                return 'you already liked it';
            }
                //first delete down value
                // update up value
                return "you disliked it";
        }

        //update upvote
        return "not yet voted";
    }


//here is a code snippet of downvote
 
    public function downvote($article)
    {
        if ($this->ifVoted($article)) {
            
            if ($this->votes->where('article_id',$article->id)->first()->down == 1) {
                
                return 'you already disliked it';
            }
                //first delete up value
                // update down value
                return "you liked it";
        }

        //update upvote
        return "not yet voted";
    }

}
