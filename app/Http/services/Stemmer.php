<?php

namespace App\Http\services;

interface Stemmer
{
    public static function stem($word);
}
