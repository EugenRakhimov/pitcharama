@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Category</th>
            <th colspan="3"></th>
          </tr>
        </thead>
         <!-- Current Products -->
        @if (count($products) > 0)
        <tbody>
          @foreach ($products as $product)
            <tr>
              <td>{{ $product->name }}</td>
              <td>{{ $product->category }}</td>
              <td>
                <form action="/product/{{ $product->id }}/edit" method="GET">
                  {{ csrf_field() }}
                  {{ method_field('EDIT') }}

                  <button type="submit" id="edit-product-{{ $product->id }}" class="btn btn-danger">
                      <i class="fa fa-btn fa-trash"></i>Edit
                  </button>
                </form>
              </td>
              <td>
                <form action="/product/{{ $product->id }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" id="delete-product-{{ $product->id }}" class="btn btn-danger">
                      <i class="fa fa-btn fa-trash"></i>Delete
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
        @endif
      </table>

      <br>

      <form action="/product/create" method="GET">
        {{ csrf_field() }}
        {{ method_field('create') }}

        <button type="submit" id="new-product" class="btn btn-danger">
            <i class="fa fa-btn fa-trash"></i>NEW
        </button>
      </form>
    </div>
    <!-- /.row -->

</div>
@endsection
