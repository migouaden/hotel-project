<?php

namespace App\Helper;
use Symfony\Component\HttpFoundation\JsonResponse;


class ResponseHelper
{


    public function __construct()
    {
            
    }

    public static function success($status='success' , $message = null  , $data = [] , $code = 200 ): JsonResponse
    {
        return new JsonResponse([

            'status'=>$status,
            'message'=>$message,
            'data'=>$data

        ] , $code);
    }

    public static function error($status='error' , $message = null  , $data = [] , $code = 400 ): JsonResponse
    {
        return new JsonResponse([

            'status'=>$status,
            'message'=>$message,
            'data'=>$data
            
        ] , $code);
    }

    public static function sendResponse($status='send' , $message = null  , $data = [] , $code = 201 ): JsonResponse
    {
        return new JsonResponse(['status' => $status, 'message' => $message ,'data'=>$data ] , $code);
    }

   
}