<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateTransactionTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItCanCreateTransactions()
    {
        $transaction = make('App\Transaction');
        $this->post('/transactions',$transaction->toArray())
            ->assertRedirect('/transactions');
        $this->get('/transactions')
            ->assertSee($transaction->description);

    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItCanCreateTransactionsWithoutDescription()
    {
        $transaction = make('App\Transaction',['description'=>null]);
        $this->withExceptionHandling()->post('/transactions',$transaction->toArray())
             ->assertSessionHasErrors('description');


    }
}
