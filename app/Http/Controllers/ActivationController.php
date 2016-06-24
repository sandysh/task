<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Auth;

class ActivationController extends Controller
{
    public function getParam($param)
    {

    	$code = User::where('activation_code',$param)->first();
    	if($code == null)
    	{
    		echo "Code doesnot exist";
    		die();
       	}

    	$code->update([
    		'status'=> 1, 
    		'activation_code'=>''
    	]);
    	Auth::login($code, true);
    	return redirect('/')->with('status', 'Account Successfully Activated');
    	//echo "Account Successfully Activated";
  
    }
}
