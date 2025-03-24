<?php

namespace App\Checkers ;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TextChecker
{
    protected $rules = [
            'text' => 'required|string',
            'operations' => 'required|array|min:1|max:3', // The 'operations' field is required, must be an array, and should contain between 1 to 3 items
            'operations.*' => 'in:uppercase,reverse,remove_spaces' // Each item in the 'operations' array must be one of the following values: 'uppercase', 'reverse', or 'remove_spaces'
            
        ];

    public $errors = [];

    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails() || count($this->errors)) {
            $this->errors = array_merge($this->errors, $validator->errors()->all());
            return false;
        }

        return true ;
    }
}