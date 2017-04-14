<?php

namespace App\Http\Controllers;

use App\Traits\Api\v1\HomeV1;
use App\Traits\Api\v2\EpgV2;
use App\Traits\Api\v2\HomeV2;
use App\Traits\JsonData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use EpgV2;
    use JsonData;
    use HomeV2;

    public function index(Request $request)
    {
        return view(
            "home",
            [
                "data" => $this->getEpgApi()->get(),

            ]
        );
    }
}
