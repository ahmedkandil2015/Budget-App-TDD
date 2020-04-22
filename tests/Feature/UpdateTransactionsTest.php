<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateTransactionsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItICanUpdateTransaction()
    {
        $transaction=$this->create('App\Transaction');
        $newTransaction=$this->make('App\Transaction');
        $this->put("/transactions/{$transaction->id}",$newTransaction->toArray())
        ->assertRedirect('/transactions');

        $this->get('transactions')
            ->assertSee($newTransaction->description);
    }
}
