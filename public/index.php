<?php

require'../vendor/autoload.php';

require_once '../bootstrap/app.php';

use App\Http\Controller\TestController;

$test = new TestController();

$test->testing();