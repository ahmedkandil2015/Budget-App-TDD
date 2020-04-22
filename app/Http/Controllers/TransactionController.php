<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateTransactionRequest;
use App\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Category|null $category
     * @return Response
     */
    public function index(Category $category=null)
    {


            $transactions = Transaction::byCategory($category)->get();

        return view('transactions.index',compact('transactions'));
    }

    public function create()
    {
        $categories=Category::all();
        return view('transactions.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTransactionRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateTransactionRequest $request)
    {

        Transaction::create($request->all());
        return redirect('transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Transaction $transaction
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->all());
        return redirect('transactions');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
