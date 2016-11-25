<?php
namespace App\Classes;

/**
 * Class AjaxResponse
 * This class must be created when executing an Ajax response. This should manage all aspects of the send and retrieve information
 * @package App\Classes
 */
class AjaxResponse{

    private $call_name = '';
    private $call_area = '';
    private $data = []; // This is the response data.
    private $response;
    private $error;

    public function __construct($cn = 'Unknown',$a = 'Unknown'){
        $this -> call_name = $cn;
        $this -> call_area = $a;

        // INITIAL CALLS
        $this -> resetError();
    }

    public function setCallName($c){
        $this -> call_name = $c;
    }
    public function getCallName(){
        return $this -> call_name;
    }
    public function setCallArea($a){
        $this -> call_area = $a;
    }
    public function getCallArea(){
        return $this -> call_area;
    }

    public function setError($id,$des){
        $this -> error -> id = $id;
        $this -> error -> description = $des;
        $this -> error -> stat   = true;
    }

    public function resetError(){
        $this -> error = new \stdClass();
        $this -> error -> id = 0;
        $this -> error -> description = '';
        $this -> error -> stat   = false;
    }

    public function setData($d){
        $this -> data = $d;
    }

    public function prepareResponse(){
        $this -> response ["error"] = $this -> error;
        $this -> response ["data"] = $this -> data;
    }
    public function getResponse(){
        $this -> prepareResponse();
        return $this -> response;
    }

    public function getJsonResponse(){
        $this -> prepareResponse();
        return response() -> json( $this->response );
    }

    /*
     * PRIVATE METHODS
     * */


}