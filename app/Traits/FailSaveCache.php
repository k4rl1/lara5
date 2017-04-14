<?php

namespace App\Traits;

use App\Exceptions\FailSaveCacheException;
use App\Facades\FailSaveCache as FailSaveCacheFacade;
use Illuminate\Support\Facades\Route;

trait FailSaveCache
{
    private function failSaveCache($cacheKey, callable $callback, $minutes) {
        try {
//            return response(jsend("error", null, "test"),503);
            $data = FailSaveCacheFacade::call($cacheKey, $callback, $minutes);

            if (in_array("api", Route::getCurrentRoute()->middleware())){
                return response()->json(jsend("success", $data));
            }
            return $data;
        } catch (FailSaveCacheException $e) {
            return response(jsend("error", null, $e->getMessage()),503);
        }
    }
}