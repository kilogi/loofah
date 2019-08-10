<?php

namespace src\Foundation;

use src\Foundation\Http\Kernel;

$app = new Application();

$app->instance(Kernel::class, new Kernel());

return $app;