<?php

use Src\Support\Debug\Dumper;

if (! function_exists('dd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed  $args
     * @return void
     */
    function dd(...$args)
    {
        http_response_code(500);

        foreach ($args as $x) {
            (new Dumper())->dump($x);
        }

        die(1);
    }
}