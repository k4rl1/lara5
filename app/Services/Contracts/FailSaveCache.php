<?php

namespace App\Services\Contracts;

interface FailSaveCache
{
    /**
     * return Cached data or perform given callback
     * @param $key
     * @param callable $callback
     * @param null $minutes
     * @throws \Exception
     * @return mixed
     */
    public function call($key, callable $callback, $minutes = null);
}
