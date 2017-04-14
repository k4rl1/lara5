<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Traits\FailSaveCache as FailSaveCacheTrait;
use Illuminate\Support\Facades\Cache;

class JsonEPGController extends Controller
{
    use FailSaveCacheTrait;

    public function get()
    {
        return $this->failSaveCache(
            __METHOD__,
            function () {
                $jsonResponse = [
                    "name" => "Peter V1",
                    "lastname" => "S"
                ];

                return $jsonResponse;
            },
            1
        );
    }
}
