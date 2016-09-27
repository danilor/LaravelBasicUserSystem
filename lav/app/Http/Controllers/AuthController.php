<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Input;
use App\Classes\Common;
use App\Classes\Registry;
use Auth;
use Redirect;


class AuthController extends Controller
{
    /**
     * Shows the login page.
     */
   public function showLogin(){
        return view('auth.login');
   }


    /**
     * Valids the login information
     */
   public function validLogin(){
        if(\Auth::check()){
			return Redirect::to("/");
		}

		// In case of success login, we want to redirect the user to the new url, that can be indicated here.
		$originalPath = "/";
		if(Input::get("url") != null && Input::get("url") != ""){
			$originalPath = Input::get("url");
		}
		/*
		 * Lets valid the fields
		 */
		$rules = array(
			'username'              =>  Common::getRule("username", true),
			'password'              =>  Common::getRule("password", true),
		);
		// Lets run the validator
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to(\Request::fullUrl())
					->withErrors($validator) // send back all errors to the login form
					->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		}
		// If it is here, then seems like the validation didn't found any error.
        $remember = false;
        $r = Input::get('remember');
        if(($r)=="y"){
            $remember = true;
        }

        // create our user data for the authentication
        $userdata = array(
            'username' 		=> 	Input::get('username'),
            'password' 		=> 	Input::get('password'),
            'status'        => 	'1',
        );
        if (Auth::attempt($userdata,$remember)) {
            \App\Classes\Registry::storeLoginLog(Auth::user());
            return Redirect::to($originalPath);
        } else {
            return Redirect::to('/login?e')->withInput(Input::except('password','_token')); // send back the input (not the password) so that we can repopulate the form
        }
   }

    /**
     * Logs out the user
     */
   public function logout(){
        Auth::logout();
		\Session::flush();
		return Redirect::to("/");
   }

}
