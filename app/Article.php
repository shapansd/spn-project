<?php

namespace App;

use App\User;

use App\comment;

use App\Vote;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['title','body','user_id','slug'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function comments()
    {
    	return $this->hasMany(comment::class);
    }

    public function votes()
    {
    	return $this->hasMany(Vote::class);
    }
}
