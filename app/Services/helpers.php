<?php

use Illuminate\Routing\ResponseFactory;

if (!function_exists('jsend')) {
    /**
     * Helper function to create a jsend object.
     * @param string $status
     * @param mixed $data [optional]
     * @param string $message [optional]
     * @param int $code [optional]
     * @return \LAOLA1\JSend
     */
    function jsend($status, $data = null, $message = null, $code = null)
    {
        return new \LAOLA1\JSend($status, $data, $message, $code);
    }
}

if (! function_exists('jsonResponse')) {
    /**
     * Return a new response from the application.
     *
     * @param  string  $content
     * @param  int     $status
     * @param  array   $headers
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    function jsonResponse($content = '', $status = 200, array $headers = [])
    {
        $factory = app(ResponseFactory::class);

        if (func_num_args() === 0) {
            return $factory;
        }

        return $factory->make($content, $status, $headers);
    }
}