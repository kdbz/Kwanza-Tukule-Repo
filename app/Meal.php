<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
	public function recipes()
    {
    return $this->hasMany('App\Recipe');
     }
     public function OrderDetails()
    {
    return $this->hasMany('App\OrderDetail');
     }
     public function category()
    {
    return $this->belongsTo('App\Category');
     }
     public function Order()
    {
    return $this->hasMany('App\Order');
     }
}
