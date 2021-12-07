<?php

namespace App\Http\Traits;


use Illuminate\Http\JsonResponse;

trait ApiResponse
{

    public static function successMessage($message = 'success', $code = 200): JsonResponse
    {
        return response()->json([
            'message'=> $message
        ], $code);
    }


    public static function errorMessage($message = "Error not found", $code = 404): JsonResponse
    {
        return response()->json([
            'message'=> $message
        ], $code);
    }


    public static function errorMessages($messages = [] , $code = 400): JsonResponse
    {
        return response()->json([
           $messages
        ], $code);
    }


    public static function successResponse($data , $nameOfData = 'data'): JsonResponse
    {
        return response()->json([
            'message'=> 'success',
            "$nameOfData" => $data
        ]);
    }

}
