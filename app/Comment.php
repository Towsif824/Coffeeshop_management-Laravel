<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $table = "comments";
	public $timestamps = false;
    protected $primaryKey = "cmt_id";
   protected  $fillable = ['comment','food_id'];
   protected $nullable =['customer_name'];

  
}

