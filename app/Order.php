<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     public $timestamps = false;
     protected $table = "orders";

     public function items()
     {
     	return $this->belongsToMany(Food::class,'order_items','order_id','food_id');
     }
}
