<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function user()
    {
    	return $this->belongsToMany('App\User');
    }

    public function project()
    {
    	return $this->belongsToMany('App\Project');
    }

    public function task()
    {
    	return $this->belongsToMany('App\Task');
    }

}
