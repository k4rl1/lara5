<?php

namespace App\Traits\Api\v2;

use App\Http\Controllers\Api\v2\JsonEPGController;

trait EpgV2
{
    private $epgApi;

    private function getEpgApi()
    {
        return $this->epgApi ?: ($this->epgApi = new JsonEPGController());
    }
}