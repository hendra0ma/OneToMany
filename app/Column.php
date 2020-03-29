<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Column extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    public function tasks()
    {
    	return $this->hasMany('App\Task')->orderBy('title','asc');
    }

}
