<?php

namespace App\Http\Controllers;
use App\Food;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Food $food)
    {
    	//dd($food);

    	\Cart::add(array(
    	'id' => $food->id,
    	'name' => $food->name,
    	'price' => $food->price,
    	'quantity' => 4,
    	'attributes' => array(),
    	'associatedModel' => $food
		));
		return redirect()->route('cart.index');
    }

    public function index()
    {
    	$carts = \Cart::getContent();
    	return view('cart.index',compact('carts'));
    }
}