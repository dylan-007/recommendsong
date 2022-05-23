<?php

namespace App\Http\services;

class Summary{

        public function getSummary($data){

            $input = json_encode($data);
            $result = exec("python summary.py  $input");

            return strval($result);
        }
}
