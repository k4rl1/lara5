<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FailSaveCache extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Services\FailSaveCache';
    }
}
