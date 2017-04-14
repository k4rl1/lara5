<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Traits\Api\v1\EpgV1;
use App\Traits\Api\v1\HomeV1;
use App\traits\InjectApiFactory;
use App\Traits\JsonData;
use App\Traits\JsonResponse;

class JsonHomeController extends Controller
{
    use EpgV1;
    use JsonResponse;
    use JsonData;

    public function get()
    {
        return $this->jsonResponse([
            "epg" => $this->jsonData($this->getEpgApi()->get()),
        ]);
    }


}
