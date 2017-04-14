<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use LAOLA1\JSend;

trait JsonData
{
    private function jsonData(JsonResponse $jsonResponse) {
        if ($jsonResponse->original instanceof JSend) {
            return $jsonResponse->getData()->data;
        }

        return [];
    }
}