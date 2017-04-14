<?php

namespace App\Http\Controllers;

use App\Traits\Api\v1\HomeV1;
use App\Traits\Api\v2\EpgV2;
use App\Traits\Api\v2\HomeV2;
use App\Traits\JsonData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    use EpgV2;
    use JsonData;
    use HomeV2;

    public function index()
    {
        return view(
            "home",
            [
                "data" => $this->getEpgApi()->get(),

            ]
        );
    }

    public function test($package = null, $date = null)
    {
        var_dump($package, $date);
    }

    public function test2($date = null)
    {
        return $this->test(null, $date);
    }
}
