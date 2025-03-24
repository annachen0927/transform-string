<?php

namespace App\Services ;

use Illuminate\Http\Request;
class TextService
{
    public $errors = [];
    public function transform($text, $operations)
    {
        foreach ($operations as $operation) {
            switch ($operation) {
                case "reverse":
                    $text = strrev($text);
                    break;
                case "uppercase":
                    $text = strtoupper($text);
                    break;
                case "remove_spaces":
                    $text = str_replace(' ', '', $text);
                    break;
                default:
                    break;
            }
        }
        
        return $text;
    }
}
