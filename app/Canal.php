<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
	protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(){
    	return 'slug';
    }

    public function threads(){
    	return $this->hasMany(Thread::class);
    }
}
