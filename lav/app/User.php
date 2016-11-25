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


    public $default_date_format = 'Y/m/d';


    /**
     * Return the email of the user
     * @return string Email
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * This function returns the full name of the user
     * @return string The user full name
     */
    public function getFullName(){
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * This function will generate a random string for the forgot password function. It will also disable all old passwords just in case.
     * @param bool $sendEmail Indicates if we want to send the email or not. Default is false
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

    /**
     * This function returns the full name of the user
     * @param $root The root element for this url. The default is /
     * @return string The Avatar Address
     */
    public function getAvatar($root = '/'){
        if($this->avatar == ""){
            return $root . config('html.default_avatar');
        }else{
            $root . config('html.avatars_route') . $this->avatar;
        }
    }

    /**
     * This method takes the creation date and return it in a date format.
     * @return string The date formatted
     */
    public function getCreationDate(){
        return date($this->default_date_format,strtotime($this->created_at));
    }

    /**
     * This method takes the update date and return it in a date format.
     * @return string The date formatted
     */
    public function getUpdatedDate(){
        return date($this->default_date_format,strtotime($this->updated_at));
    }


    /**
     * This method return the list of skills
     * @return string The date formatted
     */
    public function getSkills(){
        if($this->skills == ""){
            return [];
        }else{
            return explode( "," , $this->skills );
        }
    }

    /**
     * This method returns the list of user statuses ordered by the most recent first
     * @param int $limit The limit of the status we want to retrieve
     * @return \App\User_statuses The statuses of the user
     */
    public function getUserStatuses($limit  = 10){
        $s = User_status::where("user_id" ,  $this->id ) -> orderBy('created_at','DESC') -> take( $limit ) -> get();
        return $s;

    }




}
