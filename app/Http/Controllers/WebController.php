<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Socialite;

class WebController extends Controller
{
    //
    public function testapi()
    {
    	$u = Customer::all();
    	echo json_encode($u);
    }

    /*public function fbtn()
    {
    	return view('login.index');
    }*/

    public function fbsubmit()
    {
    	return Socialite::driver('facebook')->redirect();
    }

    public function fbres()
    {
    	$user = Socialite::driver('facebook')->stateless();;
    	dd($user);
    }


}
