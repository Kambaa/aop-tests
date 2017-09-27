<?php

namespace AOPTESTS\Service;


class ExampleService
{
    public function __construct()
    {
        echo 'ExampleService constructor' . PHP_EOL;
    }

    public function tst($wasd)
    {
        return 'tst' . $wasd . PHP_EOL;
    }

    public function method1()
    {
        echo 'method1 execution' . PHP_EOL;
    }

    public function method2()
    {
        echo 'method2 execution' . PHP_EOL;

    }

    public function method3()
    {
        echo 'method3 execution' . PHP_EOL;

    }

    public function method4()
    {
        echo 'method4 execution' . PHP_EOL;

    }

    public function method5()
    {
        echo 'method5 execution' . PHP_EOL;

    }
}