<?php
namespace App\Classes;
use Config;
use App;
use Request;
use Response;
use View;
use DB;
use Auth;
use Redirect;
use Session;
class Registry{

    public static function storeLoginLog(\App\User $user){
        $ll = new \App\Login_log();
        $ll -> user_id      =       $user->id;
        $ll -> session_id   =       Session::getId();
        $ll -> ip           =       Request::ip(true);
        $ll -> save();

        return $ll -> id;
    }

}