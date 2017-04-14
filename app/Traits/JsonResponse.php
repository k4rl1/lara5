<?php

namespace App\Traits;

trait JsonResponse
{
    private function jsonResponse($data, $status = "success", $message = null, $code = null, $httpCode = 200)
    {
        try {
            return response()->json(jsend($status, $data, $message, $code), $httpCode);
        } catch (\Exception $e) {
            return response(jsend("error", null, $e->getMessage()), 503);
        }
    }
}