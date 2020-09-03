<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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


        $user = User::find($id);
    	return view('home.edit')->with('user', $user);

    }

    function update($id, Request $request){


        $user = User::find($id);
        $user->name         = $request->name;
        $user->username     = $request->username;
        $user->password     = $request->password;
        $user->phone         = $request->phone;
        $user->email         = $request->email;
        $user->address         = $request->address;
        $user->image         = $request->image;
        $user->membership         = $request->membership;

        $user->save();

    	return redirect()->route('home.index');

    }

    function delete($id){

    	
        $user = User::find($id);
        return view('home.delete')->with('user', $user);

    }

    function destroy($id, Request $request){
    	
    	
        if(User::destroy($id)){
            return redirect()->route('home.index');
        }else{
            return redirect()->route('home.delete', $id);
        }
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('home.profile')->with('user', $user);
    }

}
