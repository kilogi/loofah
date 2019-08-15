<?php

require '../src/Support/helpers.php';

use Src\Foundation\Http\Kernel;

$app = new Src\Foundation\Application();



$app->instance('kernel', new Kernel($app,new \Src\Routing\Router()));

return $app;