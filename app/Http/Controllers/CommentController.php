<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Comment;
use App\Customer;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{
    /*public function view($id)
    {
    	 $foods = Food::find($id);
        return view('cart.comment',compact('foods'));
    }*/

    public function create($food_id){
    	 $foods = Food::find($food_id);
    	// print_r($foods);
        $comment = Comment::where('food_id',$food_id)->get();
        return view('cart.comment',compact('foods','comment'));
    }

   public function store(Request $request, $food_id){


        request()->validate([
        'comment' => 'required',
        
        ]);

        //$foods = Food::find($food_id);


        $comments = new Comment();
        $comments->comment     = $request->comment;
        //$comments->foods()->associate($foods);
        $comments->food_id = $food_id;
        $comments->customer_name = $request->session()->get('username');
        $comments->save();
        //echo $food_id;

        $foods = Food::find($food_id);
        $comment = Comment::where('food_id',$food_id)->get();
        //print_r($comment);

         /*$data = [
            'foods'=>$foods,
            //'comment'=>$request->comment,
         ];*/
        return view('cart.comment',compact('foods','comment'));
    }
}
