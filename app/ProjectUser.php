<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    public function project()
    {
    	$this->hasMany('App\Project');
    }
}
