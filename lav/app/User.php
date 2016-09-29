<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use \App\Classes\Emails;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return the email of the user
     * @return string Email
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * This function returns the full name of the user
     */
    public function getFullName(){
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * This function will generate a random string for the forgot password function. It will also disable all old passwords just in case.
     * @param bool|false $sendEmail Indicates if we want to send the email or not. Default is false
     */
    public function generatePasswordForgotCode($sendEmail = false){
        $fp = Forgot_password::generateNewPasswordRecovery($this,32);
        if( $sendEmail ){
            $body = [
                "[LINK]"      =>        config('app.url') . '/recover/' . $fp -> code
            ];
            Emails::generateEmailFromTemplate($this->id, 'forgot_password' , $body , $this->getEmail() , $this->getFullName(), config("mail.from.address") , config("mail.from.name") );
        }
        return $fp -> code;
    }



}
