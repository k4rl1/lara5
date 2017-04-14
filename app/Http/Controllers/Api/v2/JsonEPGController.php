<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Traits\FailSaveCache as FailSaveCacheTrait;

class JsonEPGController extends Controller
{
    use FailSaveCacheTrait;

    public function get()
    {
        return $this->failSaveCache(
            __METHOD__,
            function () {
                $jsonResponse = [
                    "name" => "Peter V2",
                    "lastname" => "S",
                    "version" => "zwei!!!"
                ];
                return $jsonResponse;
            },
            1
        );
    }
}
