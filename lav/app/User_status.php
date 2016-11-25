<?php

namespace App;
use App\Classes\ExtendedModel;

class User_status extends ExtendedModel
{

    /**
     * This function return the content of the status
     * @return string The content without tags
     */
    public function getContent(){
        return strip_tags($this -> content);
    }
}
