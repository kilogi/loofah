<?php

namespace Src\Foundation\Bootstrap;

use Src\Foundation\Application;

class BootProviders
{
    public function bootstrap(Application $app)
    {
       $app->boot();
    }
}