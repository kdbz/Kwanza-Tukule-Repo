<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	public function OrderDetail()
	{
    return $this->belongsTo('App\OrderDetail');
}
public function meal()
	{
    return $this->belongsTo('App\Meal');
}
public function food_types(){
    return $this->hasMany('App\Food_Type');
}
public function user(){
    return $this->belongsTo('App\User');
}
}
