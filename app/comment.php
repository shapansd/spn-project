<?php

namespace App;

use App\User;

use App\Reply;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable=['body','user_id','article_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function replies()
    {
    	return $this->hasMany(Reply::class);
    }
}
