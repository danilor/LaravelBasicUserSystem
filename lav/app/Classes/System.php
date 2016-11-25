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
class System{
    public static $users = null;

    public static function getUsers(){
        if( self::$users == null ){
            $aux = \App\User::all();
            self::$users = [];
            foreach($aux AS $u){
                self::$users[ $u->id ] = $u;
            }
        }
        return self::$users;
    }

}