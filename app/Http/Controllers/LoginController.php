<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;




class LoginController extends Controller
{
    
    function index(){
    	return view('login.index');
    }

    function verify(Request $request){
    	
        
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

     /*public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $token = $user->token;
        $user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();
        dd($user);

        // $user->token;
    }*/
}
