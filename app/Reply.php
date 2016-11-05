<?php

namespace App;

use App\User;

use App\comment;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable=['body','user_id','comment_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

     public function comment()
    {
    	return $this->belongsTo(comment::class);
    }
}
