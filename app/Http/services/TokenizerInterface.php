<?php

namespace App\Http\services;

interface TokenizerInterface
{
    public function tokenize($text, $stopwords);

    public function getPattern();
}
