<?php
namespace App\http\services;
use DonatelloZa\RakePlus\RakePlus;


class Text{
    public $text,$keywords=[],$RakePlus;
    public function __construct($text){
        $this->text= $text;
        $this->RakePlus= new Rakeplus();}

    public function predict(){
    $this->keywords = (RakePlus::create($this->text))->keywords();
    return $this->keywords;
    }
}
