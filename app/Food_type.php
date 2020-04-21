<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_type extends Model
{
    public function orderDetails(){
    return $this->hasMany('App\OrderDetail');
}
public function order()
	{
    return $this->belongsTo('App\Order');
}
}
