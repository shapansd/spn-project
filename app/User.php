<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role;

use App\Article;

use App\comment;

use App\Vote;

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

    public function hasLiked()
    {

        foreach ($this->votes as $vote) {
            if ($this->id == $vote->user_id) {
                
                return true;
            }

            return false;
        }
    }

    public function hasLikedArticle($article_id)
    {
        if ($this->hasLiked()) {
            foreach ($this->votes as $vote) {

                if ($vote->article_id == $article_id) {
                    
                    return true;
                }

                return false;
            }
        }
    }

}
