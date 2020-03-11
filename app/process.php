<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class process extends Model
{
	use SoftDeletes;
    protected $table = 'processes';
    protected $fillable = ['status'];
    protected $dates = ['deleted_at'];

}
