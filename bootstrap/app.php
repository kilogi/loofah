<?php

use Src\Foundation\Http\Kernel;

$app = new Src\Foundation\Application();

$app->instance('kernel', new Kernel());

return $app;