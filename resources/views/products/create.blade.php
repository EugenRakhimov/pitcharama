@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Product
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Product Form -->
                    <form action="/product" method="POST" class="form-horizontal" id = "productform">
                        {{ csrf_field() }}

                        <!-- Product Name -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Product</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <!-- Product Category -->
                        <div class="form-group">
                            <label for="product-category" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-6">
                              <select name="category" form="productform" id="product-category" class="form-control" value="{{ old('category') }}">
                                <option value="work">work</option>
                                <option value="leisure">leisure</option>
                                <option value="home">home</option>
                              </select>
                            </div>
                        </div>

                        <!-- Add Product Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
