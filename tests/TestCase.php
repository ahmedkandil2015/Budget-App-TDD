<?php

namespace Tests;

use App\Exceptions\PassThroughHandler;
use Exception;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Contracts\Debug\ExceptionHandler;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    protected $user;
    protected function setUp ()
    {
        parent::setUp();
        $this->user = create('App\User');
        $this->signIn($this->user)->disableExceptionHandling();
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

    protected function signIn($user)
    {
        $this->actingAs($user);
        return $this;
    }

    protected function signOut()
    {
        $this->post('logout');
        return $this;
    }
    protected function make($class,$override=[],$time=null){
        $attributes = ['user_id'=>$this->user->id]+$override;
        return make($class,$attributes,$time);
    }
    protected function create($class,$override=[],$time=null){
        $attributes = ['user_id'=>$this->user->id]+$override;

        return create($class,$attributes,$time);
    }

    }

