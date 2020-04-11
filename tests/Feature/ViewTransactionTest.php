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
    public function testItAllowOnlyAuthenticatedUsers()
    {
          $this->signOut()
              ->withExceptionHandling()
              ->get('/transactions')
              ->assertRedirect('/login');

    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testICanSeeOnlyTransactionsBelongsToLoginUser()
    {
        $otherUserId = create('App\User');
        $transaction = create('App\Transaction',['user_id'=>$this->user->id]);
        $OtherTransaction = create('App\Transaction',['user_id'=>$otherUserId->id]);
        $this->get('transactions')
        ->assertSee($transaction->description)
        ->assertDontSee($OtherTransaction->description);
    }
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
