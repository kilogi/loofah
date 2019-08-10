<?php

namespace App\Http\Controller;

class TestController extends Controller
{
    public function testing()
    {
        echo '成功';
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