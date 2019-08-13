<?php

use src\Foundation\Http\Kernel;

$app = new Src\Foundation\Application();

$app->instance(Kernel::class, new Kernel());

return $app;