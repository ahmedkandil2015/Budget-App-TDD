@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Transaction</div>

                    <div class="panel-body">
                        <form action="/transactions" method="post">
                                {{csrf_field()}}
                                <div class="form-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-md">Category</span>
                                    </div>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-md">Description</span>
                                    </div>
                                    <input type="text" name='description' class="form-control" >
                                </div>
                                <div class="form-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-md">Amount</span>
                                    </div>
                                    <input type="text" name='amount' class="form-control" >
                                </div>
                            <div>
                                <button class="btn btn-primary pull-right" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
