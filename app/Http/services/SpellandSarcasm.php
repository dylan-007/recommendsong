<?php

namespace App\Http\services;

class SpellandSarcasm
{
        public function predict($data){

            $arr = array();

            $result6 = $data;
            $result6 = json_encode($result6);
            $result6 = exec("python spell.py  $result6");
            $result7 = $result6;
            $result7 = json_encode($result7);
            $result7 = exec("python sarcasm.py  $result7");

            $arr[0] = $result6;
            $arr[1] = $result7;

            return $arr;
        }
    }
