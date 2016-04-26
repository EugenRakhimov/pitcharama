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
                    <form action="/admin/portfolio/{{ $product->id }}" method="POST" class="form-horizontal" id = "productform">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <!-- Product Name -->
                        <div class="form-group">
                            <label for="product-name" class="col-sm-3 control-label">Product</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="product-name" class="form-control" value="{{ $product->name  }}">
                            </div>
                        </div>
                        <!-- Product image link -->
                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label">Image link</label>

                            <div class="col-sm-6">
                                <input type="text" name="image" id="image" class="form-control" value="{{ $product->image }}">
                            </div>
                        </div>
                        <!-- Product Category -->
                        <div class="form-group">
                            <label for="product-category" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-6">
                              <select name="category" form="productform" id="product-category" class="form-control" value="{{ $product->category }}">
                                <option value="mobile">mobile</option>
                                <option value="web" {{$product->category=='web' ? 'selected':'' }}>web</option>
                                <option value="games" {{$product->category=='games' ? 'selected':'' }}>games</option>
                                <option value="strategy" {{$product->category=='strategy' ? 'selected':'' }}>strategy</option>
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
