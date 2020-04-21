<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = "categories";
    public function meals()
    {
    	return $this->hasMany('App\Meal');
    }
}
