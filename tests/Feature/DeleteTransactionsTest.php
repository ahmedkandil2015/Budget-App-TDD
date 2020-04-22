<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteTransactionsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItICanDeleteTransaction()
    {
        $transaction=$this->create('App\Transaction');
        $this->delete("/transactions/{$transaction->id}")
        ->assertRedirect('/transactions');

        $this->get('transactions')
            ->assertDontSee($transaction->description);
    }

}
