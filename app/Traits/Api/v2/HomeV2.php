<?php

namespace App\Traits\Api\v2;

use App\Http\Controllers\Api\v2\JsonHomeController;

trait HomeV2
{
    private $homeApi;

    private function getHomeApi()
    {
        return $this->homeApi ?: ($this->homeApi = new JsonHomeController());
    }
}