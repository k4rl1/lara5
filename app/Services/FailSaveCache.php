<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Services\Contracts\FailSaveCache as FailSaveCacheContract;

class FailSaveCache implements FailSaveCacheContract
{

    const DEFAULT_CACHE_TIME = 360;
    const RESTORE_CACHE_TIME = 5;

    private $failSaveBackup;
    private $failSaveTimeout;

    public function __construct($failSaveBackup = null, $failSaveTimeout = null)
    {
        $this->failSaveBackup = $failSaveBackup ?: self::DEFAULT_CACHE_TIME;
        $this->failSaveTimeout = $failSaveTimeout ?: self::RESTORE_CACHE_TIME;
    }

    public function call($key, callable $callback, $minutes = null)
    {
        //TODO: handle cache fails
        if ($this->has($key)) {
            // serve from cache
            return $this->get($key);
        } else {
            try {
                // compute the value
                $value = $callback();
                // fill the cache
                $this->put($key, $value, $minutes);
                // and return it
                return $value;
            } catch (\Exception $e) {
                // serve stale content iff available
                return $this->restoreAndGet($key);
            }
        }
    }

    private function has($key)
    {
        if (($value = Cache::get($key)) !== null) {
            return isset($value["timestamp"]) && time() < $value["timestamp"];
        }
        return false;
    }

    private function get($key)
    {
        $value = Cache::get($key);
        if (isset($value["data"])) {
            return $value["data"];
        }
        return null;
    }

    private function put($key, $value, $minutes)
    {
        Cache::put(
            $key,
            [
                "timestamp" => time() + ($minutes * 60),
                "data" => $value,
            ],
            self::DEFAULT_CACHE_TIME
        );
    }

    private function restoreAndGet($key)
    {
        if (!Cache::has($key)) {
            // TODO: handle this case by throwing an exception
            return null;
        }

        // TODO: what if get fails?
        $value = $this->get($key);
        $this->put($key, $value, self::RESTORE_CACHE_TIME);
        return $value;
    }
}