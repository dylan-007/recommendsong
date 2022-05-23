<?php

namespace App\Http\services;
use App\Http\services\TopicClassifier;

class Prediction{
public $input, $classifier;

public function __construct($input)
{
        $this->input = $input;
        $this->classifier = new TopicClassifier();
}

public function predict(){
$this->classifier->load('./News_model.cls');

$guess = $this->classifier->predict($this->input);

return $guess['label'];
}

}
