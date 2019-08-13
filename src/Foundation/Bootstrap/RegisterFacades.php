<?php

namespace Src\Foundation\Bootstrap;

use Src\Foundation\Application;
use Src\Facade\Facade;

class RegisterFacades
{

    public function bootstrap(Application $app)
    {
       Facade::setFacadeApplication($app);
    }
}