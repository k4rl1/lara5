<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function test($package = "all", $date = null)
    {
        var_dump($package, $date);
    }

    public function test2($date = null)
    {
        return $this->test(null, $date);
    }
}
