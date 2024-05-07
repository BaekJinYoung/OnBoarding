<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    private $test = 1;

    public function test($test = 2)
    {
        dd($this->test);
    }
}
