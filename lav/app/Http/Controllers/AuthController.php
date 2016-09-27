<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Shows the login page.
     */
   public function showLogin(){
        return view('auth.login');
   }

}
