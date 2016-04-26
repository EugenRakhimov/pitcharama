@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        Product
      </div>

      <div class="panel-body">
        <p>
          <strong>Product name</strong>
          {{ $product->name }}
        </p>
        <p>
          <strong>Product category:</strong>
            {{ $product->category }}
        </p>
      </div>
    </div>
  </div>
  <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th>Feature</th>
          <th>Text</th>
          <th>Content</th>
          <th>Image frame</th>
          <th>Image</th>
          <th colspan="3"></th>
        </tr>
      </thead>
       <!-- Current Products -->
      @if (count($product->features) > 0)
      <tbody>
        @foreach ($product->features as $feature)
          <tr>
            <td>{{ $feature->name }}</td>
            <td>{{ $feature->feature_body}}</td>
            <td>
              {{$feature->content}}
            </td>
            <td>
              {{$feature->image_frame}}
            </td>
            <td>
              <img src="{{$feature->image}}" alt="" />
            </td>
            <td>
              <form action="/admin/portfolio/{{$product->id}}/feature/{{ $feature->id }}/edit" method="GET">
                {{ csrf_field() }}
                {{ method_field('EDIT') }}

                <button type="submit" id="edit-feature-{{ $feature->id }}" class="btn btn-danger">
                    <i class="fa fa-btn fa-trash"></i>Edit
                </button>
              </form>
            </td>
            <td>
              <form action="/admin/portfolio/{{$product->id}}/feature/{{ $feature->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" id="delete-feature-{{ $feature->id }}" class="btn btn-danger">
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

    <form action="/admin/portfolio/{{$product->id}}/feature/create" method="GET">
      {{ csrf_field() }}
      {{ method_field('create') }}

      <button type="submit" id="new-feature" class="btn btn-danger">
          <i class="fa fa-btn fa-trash"></i>NEW
      </button>
    </form>
  </div>

</div>


@endsection
