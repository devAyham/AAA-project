<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function sendResponse($result , $message)
    {
        $responce = [
            'success' => true,
            'data' => $result,
            'message' =>$message
        ];
        return response()->json($responce , 200);
    }

    public function sendError($error , $errorMessage=[] , $code=404 )
    {
        $responce = [
            'success' => false,
            'data' => $error,
            'message' =>$errorMessage
        ];
        if(!empty($errorMessage)){
            $responce['data'] = $errorMessage;
        }
        return response()->json($responce , $code);
    }
}
