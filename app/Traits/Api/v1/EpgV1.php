<?php

namespace App\Traits\Api\v1;

use App\Http\Controllers\Api\v1\JsonEPGController;

trait EpgV1
{
    private $epgApi;

    private function getEpgApi()
    {
        return $this->epgApi ?: ($this->epgApi = new JsonEPGController());
    }
}