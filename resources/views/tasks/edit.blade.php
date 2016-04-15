@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="/task/{{ $task->id }}" method="POST" class="form-horizontal" id = "taskform">
                        {{ csrf_field() }}                   
                        {{ method_field('PATCH') }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="task_name" id="task-name" class="form-control" value="{{ $task->task_name  }}">
                            </div>
                        </div>
                        <!-- Task Date -->
                        <div class="form-group">
                            <label for="task-date" class="col-sm-3 control-label">Date to do</label>

                            <div class="col-sm-6">
                                <input type="date" name="do_before" id="task-date" class="form-control" value="{{ $task->do_before}}">
                            </div>
                        </div>
                        <!-- Task Category -->
                        <div class="form-group">
                            <label for="task-category" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-6">
                              <select name="category" form="taskform" id="task-category" class="form-control" value="{{ $task->category }}">
                                <option value="work" >work</option>
                                <option value="leisure" {{$task->category=='leisure' ? 'selected':'' }} >leisure</option>
                                <option value="home" {{$task->category=='home' ? 'selected' : ''}}>home</option>
                              </select>
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection