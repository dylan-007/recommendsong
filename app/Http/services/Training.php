<?php

namespace App\Http\services;
use App\Http\services\TopicClassifier;

class Training{

public $filename, $classifier;
public $topis = [
    3 => 'Comupter Science',
    4 => 'Physics',
    5 => 'Mathmatics',
    6 => 'Statistics',
    7 => 'Biology',
    8 => 'Finance',
];



public function __construct($filename)
{
        $this->filename = $filename;
        $this->classifier = new TopicClassifier();
}


public function train(){

    $this->readfile();

    // info('finally here');
    $this->classifier->save('./model.cls');

}

public $i=0;
public function readfile(){
    $file = fopen($this->filename, "r");

    if ($file) {
        while (($line = fgetcsv($file)) !== false) {

            if($this->i == 1){
                $this->i++;
                continue;
            }

            $inx = 3;

            // echo var_dump($line[$inx]);

            for($inx=3; $inx<count($line); $inx++){
                if(strval($line[$inx]) == '1'){
                    break;
                }
            }

            // info($this->i);

            if($inx<count($line)){
            info($this->topis[$inx]);
            $this->classifier->learn($line[1], $this->topis[$inx]);
            $this->classifier->learn($line[2], $this->topis[$inx]);
            }

            $this->i++;
        }

        fclose($file);
}

}
}
