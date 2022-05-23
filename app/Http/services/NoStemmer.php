<?php

namespace App\Http\services;

class NoStemmer implements Stemmer
{
    public static function stem($word)
    {
        return $word;
    }
}
