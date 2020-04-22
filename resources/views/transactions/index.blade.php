@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <a class="btn btn-primary pull-right" href="{{route('transactions.create')}}">Add New Transaction</a>
            </div>
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
                                    <td>Action</td>
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
                                            <td>
                                                <a href="{{route('transactions.edit',$transaction->id)}}"><i class="fa fa-edit"></i></a>
                                                <form action="transactions/{{$transaction->id}}/delete" method="post" style="display: inline-block">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit">save</button>
                                                    <a href="{{route('transactions.destroy',$transaction->id)}}" type="submit"><i class="fa fa-recycle text-danger"></i></a>
                                                </form>
                                            </td>
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
