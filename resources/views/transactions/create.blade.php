@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Transaction</div>

                    <div class="panel-body">
                        <form action="/transactions" method="post">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-md">Small</span>
                                    </div>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-md">Small</span>
                                    </div>
                                    <input type="text" name='description' class="form-control" >
                                </div>

                                <div class="form-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-md">Small</span>
                                    </div>
                                    <input type="text" name='description' class="form-control" >
                                </div>
                                <div class="form-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-md">Small</span>
                                    </div>
                                    <input type="text" name='description' class="form-control" >
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
