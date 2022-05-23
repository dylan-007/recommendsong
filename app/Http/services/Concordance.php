<?php

namespace App\Http\services;

class Concordance{

    public function getConcordance($input, $word){

        $input = json_encode($input);
        $word1 = json_encode($word);
        $result = exec("python concordance.py  $input $word1");
        // return strval($result);

        $arr = json_decode($result);

        return $arr;
    }



}
