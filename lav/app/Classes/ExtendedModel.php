<?php
namespace App\Classes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExtendedModel
 * This class is intented to extend the main Model class in order to add all the functions that are going to be the same for all classes, like the date of creation and update.
 * @package App\Classes
 */
class ExtendedModel extends Model{

    public $default_date_format = 'Y/m/d';
    public $default_date_format_extra = 'Y/m/d H:i:s';

    public $created_at_format = '';
    public $updated_at_format = '';


    public function __construct(){
        parent::__construct();
        $this -> created_at_format = $this -> getCreationDate();
        $this -> updated_at_format = $this -> getUpdatedDate();
    }

    /**
     * This method takes the creation date and return it in a date format.
     * @return string The date formatted
     */
    public function getCreationDate(){
        return date($this->default_date_format,strtotime($this->created_at));
    }

    /**
     * This method takes the creation date and return it in a date format.
     * @return string The date formatted
     */
    public function getCreationDateExtra(){
        return date($this->default_date_format_extra,strtotime($this->created_at));
    }

    /**
     * This method takes the update date and return it in a date format.
     * @return string The date formatted
     */
    public function getUpdatedDate(){
        return date($this->default_date_format,strtotime($this->updated_at));
    }

    /**
     * This method takes the update date and return it in a date format.
     * @return string The date formatted
     */
    public function getUpdatedDateExtra(){
        return date($this->default_date_format_extra,strtotime($this->updated_at));
    }

}