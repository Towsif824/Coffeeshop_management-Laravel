<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Validator;




class LoginController extends Controller
{
    
    function index(){
    	return view('login.index');
    }

    function verify(Request $request){
    	 $validation = Validator::make($request->all(), [
            'username'=>'bail|required|exists:customers,username',
            'password'=>'required|exists:customers,password'
         ]);
        
        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();

            return redirect()->route('/login')
                            ->with('errors', $validation->errors())
                            ->withInput();
            }
            else{



        $data = DB::table('customers')
                    ->where('username', $request->username)
                    ->where('password', $request->password)
                    ->get();

        //print_r($data);
        //echo $data[0]->type;

    	if(count($data) > 0 ){
            $request->session()->put('username', $request->username);
    		return redirect()->route('home.index');
    	}else{
            $request->session()->flash('msg', 'invalid username/password');
            return redirect()->route('login.index');
        }
    }
}

     public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless();

       
        dd($user);

        // $user->token;
    }
}
