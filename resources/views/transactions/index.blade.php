@extends('layouts.app')
<div class="container">
    <div class="table-responsive">
        <table>
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
