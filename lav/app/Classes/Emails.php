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
class Emails{

    public static function generateEmailFromTemplate($generatedBy,$template,$body=[],$toEmail,$toName,$fromEmail,$fromName , $html_template = 'basic'){

        $email = new \App\Email();
        $email ->   user_id     =       $generatedBy;
        $email ->   subject     =       trans('email.forgot_password.subject');
        $email ->   template    =       $html_template;
        $email ->   from_email  =       $fromEmail;
        $email ->   from_name   =       $fromName;
        $email ->   to_email    =       $toEmail;
        $email ->   to_name     =       $toName;
        $bodyContent            =       trans('email.forgot_password.body');
        foreach( $body AS $key => $value ){
            $bodyContent        =       str_replace($key,$value,$bodyContent);
        }
        $email ->   body        =       $bodyContent;
        $email ->   sent        =       0;
        $email ->   sent_date   =       null;
        $email ->   result      =       null;

        //lets save the email and return its ID
        $email -> save();
        return $email -> id;
    }

}