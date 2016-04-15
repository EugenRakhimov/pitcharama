@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tasks</h1>            
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th>Task</th>
            <th>Time to do</th>
            <th>Category</th>                     
            <th colspan="3"></th>
          </tr>
        </thead>
         <!-- Current Tasks -->
        @if (count($tasks) > 0)
        <tbody>
          @foreach ($tasks as $task)
            <tr>
              <td>{{ $task->task_name }}</td>
              <td>{{ $task->do_before }}</td>
              <td>{{ $task->category }}</td>          
              <td>
                <form action="/task/{{ $task->id }}/edit" method="GET">
                  {{ csrf_field() }}
                  {{ method_field('EDIT') }}

                  <button type="submit" id="edit-task-{{ $task->id }}" class="btn btn-danger">
                      <i class="fa fa-btn fa-trash"></i>Edit
                  </button>
                </form>
              </td>
              <td>
                <form action="/task/{{ $task->id }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
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

      <form action="/task/create" method="GET">
        {{ csrf_field() }}
        {{ method_field('create') }}

        <button type="submit" id="new-task" class="btn btn-danger">
            <i class="fa fa-btn fa-trash"></i>NEW
        </button>
      </form>
    </div>
    <!-- /.row -->

</div>
@endsection





