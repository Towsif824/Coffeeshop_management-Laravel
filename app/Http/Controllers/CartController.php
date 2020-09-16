<?php

namespace App\Http\Controllers;
use App\Food;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Food $food)
    {
    	dd($food);

    }
}