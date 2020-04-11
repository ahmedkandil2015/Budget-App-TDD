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
        $transaction=create('App\Transaction');

        $this->get('/transactions')
            ->assertSee($transaction->description)
            ->assertSee($transaction->category->name);

    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanFilterTransactionsByCategory()
    {
        $category = create('App\Category');
        $transactions=create('App\Transaction',['category_id'=>$category->id]);
        $anotherTransactions=create('App\Transaction');

        $this->get('transactions/'.$category->slug)
            ->assertSee($transactions->description)
            ->assertDontSee($anotherTransactions->description);
    }
}
