<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Food;
use Illuminate\Support\Facades\DB;

//use Validator;

class HomeController extends Controller
{

    /*function __construct(){
        //session
    }*/
    
    function index(Request $request){

    	
        $users = DB::table('customers')->where('username',$request->session()->get('username'))->first();
        //$user = 
        return view('home.index')->with('users', $users);
        //echo $request->session()->get('username');
    }


    public function create(Request $request){
        return view('home.create');
    }

    public function store(Request $request){


        $request->validate([
            'username'  => 'required|max:5',
            'name'      => 'required',
            'password'  => 'required',
            'type'      => 'required',
            'cgpa'      => 'required'
        ])->validate();


        $user = new User();
        $user->username     = $request->username;
        $user->name         = $request->name;
        $user->password     = $request->password;
        $user->type         = $request->type;
        $user->cgpa         = $request->cgpa;
        $user->dept         = $request->dept;
        $user->save();

        return redirect()->route('home.index');
    }

    function edit($id){
        $user = Customer::find($id);
    	return view('home.edit')->with('user', $user);

    }

    function update( Request $request, $id){

        request()->validate([
        'name' => 'required|string|max:100',
        'username' => 'required|string|max:100',
        'password' => 'required|min:4',
        'phone' => 'required|string',
        'email' => 'required|email',
        'address' => 'required|string|max:200',
        //'image' => 'required|mimes:jpeg,jpg,png|max:5000',
        'membership' => 'string|min:4',
        ]);

        $user = Customer::find($id);
        $user->name         = $request->name;
        $user->username     = $request->username;
        $user->password     = $request->password;
        $user->phone        = $request->phone;
        $user->email        = $request->email;
        $user->address      = $request->address;
        $user->membership   = $request->membership;
        if (request()->hasFile('image')) {
        $file = request()->file('image');
//            dd($file);
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'. $extension;
        $file->move('img/profile/', $filename);
        $user->image =$filename;
        $user->save();
    }

        $user->save();

    	return redirect()->route('home.index');

    }

    function delete($id){

    	
        $user = Customer::find($id);
        return view('home.delete')->with('user', $user);

    }

    function destroy($id, Request $request){
    	
    	
        if(Customer::destroy($id)){
            return redirect()->route('home.index');
        }else{
            return redirect()->route('home.delete', $id);
        }
    }

    public function profile($id)
    {
        $user = Customer::find($id);
        return view('home.profile')->with('user', $user);
    }

    public function menu(Request $request)
    {
        $foods = Food::all();
        return view('home.food', compact('foods'));
    }

      public function search($id){


        $userinfo = Food::all();
        $food = Food::where('name','like','%'.$id.'%')
       ->get();
       //return response()->json(array('food'=> $food), 200);
       return view('search.search')->with(['food'=>$food]);
     }

     public function download($id)
    {
        $data = Food::all();
        $proData="";
        if(count((array)$data)>0){
            $proData .='<table align="center">
            <tr>
                 <th align="center" style="background-color:brown">'."Number".'</th>
                 <th align="center" style="background-color:brown">'."Name".'</th>
                 <th align="center"style="background-color:brown; width:130px; height:30px;">'."Price".'</th>
                 </tr>';

            foreach ($data as $key=>$item) {
                 $proData .='
                 <tr>
                 <td align="center" style="width:130px;">'.$item->id.'</td>
                 <td align="center" style="width:130px;">'.$item->name.'</td>
                 <td align="center" style="width:130px;">'.$item->price.'</td>
                 </tr>';
            }
            $proData .='</table>';
        }
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=menu.xls');
        echo $proData;
    }

    public function userHistory(Request $request)
    {
        $data = DB::table('orders')->where('user',$request->session()->get('username'))->get();
            return view('home.userHistory', compact('data'));
    }


    

}
