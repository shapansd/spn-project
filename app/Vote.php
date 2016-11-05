<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Vote extends Model
{
    protected $fillable=['article_id','user_id'];

    public function user($value='')
    {
    	return $this->belongsTo(User::class);
    }
}
