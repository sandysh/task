<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = ['name','user_id','project_id'];
	
	protected $table = 'tasks';

    public function projects()
    {
    	return $this->belongsTo('App\Task');
    }
}
