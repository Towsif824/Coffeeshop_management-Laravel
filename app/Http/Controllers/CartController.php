<?php

namespace App\Http\Controllers;
use App\Food;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Food $food)
    {
    	//dd($food);

    	\Cart::add(array(
    	'id' => $food->id,
    	'name' => $food->name,
    	'price' => $food->price,
    	'quantity' => 1,
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

    public function destroy($id)
    {
    	\Cart::remove($id);
    	return back();
    }
    public function update(Request $request,$id)
    {
        
    	\Cart::update($id,[
            $request->validate([
            'quantity'=>'required|numeric|gt:1'
        ]),
		'quantity' => array(
		'relative' => false,
		'value'=> request('quantity')
		)
		]);
    	return back();
    }

    public function checkout()
    {
        return view('cart.checkout');
    }

    public function export(Request $request)
    {
        $data = DB::table('orders')->where('user',$request->session()->get('username'))->first();
        $proData="";
        if(count((array)$data)>0){
            $proData .='<table align="center">
            ';

            foreach ($data as $key=>$item) {
                 $proData .='
                 <tr>
                 <td>'.$key.'</td>
                 <td align="center">'.$item.'</td>
                 </tr>';
            }
            $proData .='</table>';
        }
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=checkout.xls');
        echo $proData;
        //var_dump($data);
        //echo count($data);
        //return response()->json($data);
    }
}