<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable=['plus','minus','user_id','article_id'];


     public function user($value='')
    {
    	return $this->belongsTo(User::class);
    }

    public static function plus($article_id)
    {
    	return (integer) Rate::where('article_id',$article_id)->where('plus',1)->count();
    }

    public static function minus($article_id)
    {
    	return (integer) Rate::where('article_id',$article_id)->where('minus',1)->count();
    }
}
