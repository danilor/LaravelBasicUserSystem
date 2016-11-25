<?php

namespace App\Http\Controllers;

use App\Classes\System;
use App\User;
use App\user_status_comment;
use Validator;
use App\Http\Controllers\Controller;
use Input;
use App\Classes\Common;
use App\Classes\Registry;
use Auth;
use Redirect;


class StatusController extends Controller
{
    /**
     * Shows the login page.
     */
   public function getStatusComments(){
        $response = new \App\Classes\AjaxResponse("Status","Get Comments");
        $comments = [];
        $comments["total_comments"] = 0;
        if(Input::get('ids') == ""){
            $response->setError(1,'Ids missing');
            return $response->getJsonResponse();
        }
        $ids = explode('|',Input::get('ids'));
        $user_status_comments = user_status_comment::whereIn("status_id",$ids)->orderBy("created_at","DESC")->get();

        //dd( $user_status_comments );

        $comments_object = [];

        foreach($user_status_comments AS $c){
            $comments_object[ $c->status_id ] = new \stdClass();
            $comments_object[ $c->status_id ] -> comments = [];
            $comments_object[ $c->status_id ] -> total_comments = 0;
        }

        foreach($user_status_comments AS $key => $c){
            $c -> created_at_format = $c -> getCreationDateExtra();
            $c -> updated_at_format = $c -> getUpdatedDateExtra();
            $c -> user_name = System::getUsers()[$c->user_id]->getFullName();
            $c -> user_avatar = System::getUsers()[$c->user_id]->getAvatar();
            $comments_object[ $c->status_id ] -> comments[] = $c;
            $comments_object[ $c->status_id ] -> total_comments ++ ;

        }

        //dd( $comments_object );

        $comments["comments"] = ( $comments_object );
        $response->setData( $comments );
        return $response->getJsonResponse();

   }

   public function SaveStatusComments(){
        $response = new \App\Classes\AjaxResponse("Status","Save Comment");
        $rules = array(
			'status_id'                 =>  Common::getRule("number", true,'exists:user_statuses,id'),
			'content'                   =>  Common::getRule("gentext", true),
		);
		// Lets run the validator
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
            $response->setError(1,'Error in fields');
            return $response->getJsonResponse();
		}
		$response->resetError();
		try{
            $usc = new user_status_comment();
            $usc -> user_id = Auth::user()->id;
            $usc -> status_id = (int) Input::get("status_id");
            $usc -> content = Input::get("content");
            $usc -> location = '';
            $usc -> status = 1;
            $usc -> save();
		}catch (\Exception $r){
		    $response->setError(1,'Error Storing the information');
		}

		$response->setData(["id"=>0]);
		return $response->getJsonResponse();
   }
}
