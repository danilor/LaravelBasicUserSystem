<?php

namespace App;

use App\Classes\ExtendedModel;

class Forgot_password extends ExtendedModel
{

    /**
     * This function generates a random code and returns it. It also has the ability to set it up at once
     * @param $start The start number code
     * @param $end The end number code
     * @param bool|false $set if we want to set it automatically. Default is false.
     */
    public function generateCode($start = 32,$end = 32,$set = false){
        // We set all to lower to maximize compatibility
        $code = strtolower( date("Ymd") . str_random($start) . 'PR' . str_random($end) ); // Generate the code
        if( $set ){
            $this -> code = $code;
        }
    }

    /**
     * This function takes one user and generates the password recovery object for it. If there are old passwords recovery for this user, then we are nulling them
     * @param User $user
     * @param int $mid_lenght
     */
    public static function generateNewPasswordRecovery(\App\User $user, $mid_lenght = 32){
            self::where( "user_id" , $user->id ) -> update( ["status" => 0] ); // We close all old recoveries
            // We craete a new one and return it
            $fp = new self;
            $fp -> user_id      =       $user -> id;
            $fp -> generateCode( $mid_lenght , $mid_lenght , true);
            $fp -> used         =       null;
            $fp -> status       =       1;
            $fp -> save();
            return $fp;
    }

}
