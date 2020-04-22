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
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateTransactionWithoutDescription()
    {
        $transaction=$this->create('App\Transaction');
        $newTransaction=$this->make('App\Transaction',['description'=>null]);
        $this->withExceptionHandling()->put("/transactions/{$transaction->id}",$newTransaction->toArray())
            ->assertSessionHasErrors('description');


    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateTransactionWithoutAmount()
    {
        $transaction=$this->create('App\Transaction');
        $newTransaction=$this->make('App\Transaction',['amount'=>null]);
        $this->withExceptionHandling()->put("/transactions/{$transaction->id}",$newTransaction->toArray())
            ->assertSessionHasErrors('amount');


    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateTransactionWithoutCategoryId()
    {
        $transaction=$this->create('App\Transaction');
        $newTransaction=$this->make('App\Transaction',['category_id'=>null]);
        $this->withExceptionHandling()->put("/transactions/{$transaction->id}",$newTransaction->toArray())
            ->assertSessionHasErrors('category_id');


    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateTransactionWithoutValidAmount()
    {
        $transaction=$this->create('App\Transaction');
        $newTransaction=$this->make('App\Transaction',['amount'=>'sdsdsdsdds']);
        $this->withExceptionHandling()->put("/transactions/{$transaction->id}",$newTransaction->toArray())
            ->assertSessionHasErrors('amount');


    }
}
