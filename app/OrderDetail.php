<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	public function orders(){
    return $this->hasMany('App\Order');
}
public function meal()
	{
    return $this->belongsTo('App\Meal');
}
public function foodType()
    {
    	return $this->belongsTo('App\Food_type');
    }
}
