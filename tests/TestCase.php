<?php

namespace Tests;

use App\Exceptions\PassThroughHandler;
use Exception;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Contracts\Debug\ExceptionHandler;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp ()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    protected function disableExceptionHandling ()
    {
        $this->oldExceptionHandler = app()->make(ExceptionHandler::class);
        app()->instance(ExceptionHandler::class, new PassThroughHandler());
    }

    protected function withExceptionHandling ()
    {
        app()->instance(ExceptionHandler::class, $this->oldExceptionHandler);
        return $this;
    }
}

