<?php

namespace App\Http\Controller;

class TestController extends Controller
{
    public function testing($a)
    {
        echo $a;
    }

    public function getTest()
    {
        echo 'get成功';
    }

    public function postTest()
    {
        echo 'post成功';
    }
}