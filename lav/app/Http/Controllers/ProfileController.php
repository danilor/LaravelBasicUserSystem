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


class profileController extends Controller
{
    /**
     * Shows the login page.
     */
   public function showProfile(){
        return view('profile.main');
   }
}
