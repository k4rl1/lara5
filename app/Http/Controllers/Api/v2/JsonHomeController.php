<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Traits\Api\v2\EpgV2;
use App\Traits\JsonData;
use App\Traits\JsonResponse;
use Illuminate\Support\Facades\Route;


class JsonHomeController extends Controller
{
    use EpgV2;
    use JsonResponse;
    use JsonData;

    public function get()
    {
        return $this->jsonResponse([
            "epg" => $this->jsonData($this->getEpgApi()->get()),
            "super" => "toll"
        ]);
    }
}
