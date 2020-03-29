<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewTransactionTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testICanDisplayAllTransactions()
    {
        $transaction = factory('App\Transaction')->create();
        $this->get('/transactions')
            ->assertSee($transaction->description)
            ->assertSee($transaction->category->name);

    }
}
