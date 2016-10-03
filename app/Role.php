<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=['role'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function hasRole($name)
    {
    	foreach ($this->role as $role) {
    		
    		if($role == $name) return true;
    	}

    	return false;
    }
}
