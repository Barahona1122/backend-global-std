<?php


namespace App\Admin\Helpers;
use Symfony\Component\HttpFoundation\Response;

class ApiResponse
{
    public static function success($message = '', $data = []){
        return response()->json([
            'success' => true,
            'message' => $message,
        ], 200);
    }

    public static function successWithData($data = [], $message = ''){
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data
        ], 200);
    }

    public static function error($message = '', $error = '', $code = Response::HTTP_BAD_REQUEST, $data = []){
        return response()->json([
            'success' => false,
            'message' => $message,
            'error' => $error,
            'data'    => $data
        ], $code);
    }
}