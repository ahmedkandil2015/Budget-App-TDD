@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Transactions</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Date</td>
                                    <td>Description</td>
                                    <td>Category</td>
                                    <td>Amount</td>
                                </tr>
                                </thead>
                                <tbody>
                                @if($transactions->count()>0)
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{$transaction->created_at->format('m/d/y')}}</td>
                                            <td>{{$transaction->description}}</td>
                                            <td>{{$transaction->category->name}}</td>
                                            <td>{{$transaction->amount}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
