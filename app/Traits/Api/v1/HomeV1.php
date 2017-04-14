<?php

namespace App\Traits\Api\v1;

use App\Http\Controllers\Api\v1\JsonHomeController;

trait HomeV1
{
    private $homeApi;

    private function getHomeApi()
    {
        return $this->homeApi ?: ($this->homeApi = new JsonHomeController());
    }
}