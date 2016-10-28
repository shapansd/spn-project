<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable=['body','user_id','comment_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
