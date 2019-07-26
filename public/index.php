<?php

require'../vendor/autoload.php';

use App\Http\Controller\TestController;

$test = new TestController();

$test->testing();