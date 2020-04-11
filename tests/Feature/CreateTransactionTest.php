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
    public function testCannotCreateTransactionsWithoutDescription()
    {
        $transaction = make('App\Transaction',['description'=>null]);
        $this->withExceptionHandling()->post('/transactions',$transaction->toArray())
             ->assertSessionHasErrors('description');


    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCannotCreateTransactionsWithoutCategoryId()
    {
        $transaction = make('App\Transaction',['category_id'=>null]);
        $this->withExceptionHandling()->post('/transactions',$transaction->toArray())
             ->assertSessionHasErrors('category_id');


    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCannotCreateTransactionsWithoutMount()
    {
        $transaction = make('App\Transaction',['amount'=>null]);
        $this->withExceptionHandling()->post('/transactions',$transaction->toArray())
             ->assertSessionHasErrors('amount');


    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCannotCreateTransactionsWithoutValidMount()
    {
        $transaction = make('App\Transaction',['amount'=>'asdasdasd']);
        $this->withExceptionHandling()->post('/transactions',$transaction->toArray())
             ->assertSessionHasErrors('amount');


    }
}
