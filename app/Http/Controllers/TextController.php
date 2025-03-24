<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TextService ;
use App\Checkers\TextChecker ;

class TextController extends Controller
{
    public function __construct(
        TextService $textService,
        TextChecker $textChecker
        )
    {
        $this->textService = $textService;
        $this->textChecker = $textChecker;
        
    }

    public function transform(Request $request)
    {
        if(!$this->textChecker->validate($request))
            return response()->json([
                'success' => false,
                'errorMsg' => $this->textChecker->errors
            ], 400);
 
        $processedText = $this->textService->transform($request["text"], $request["operations"]);
        return response()->json([
            'original_text' => $request["text"],
            'processed_text' => $processedText
        ]);
        
    }
}