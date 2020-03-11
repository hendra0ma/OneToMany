<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Column extends Model
{

	protected $dates = ['deleted_at'];

    public function tasks()
    {
    	return $this->hasMany('App\Task');
    }

}
