@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tasks">My Tasks</a></li>
        <li><a data-toggle="tab" href="#new_task">Create Task</a></li>
    </ul>

    <div class="tab-content padded">
        <div id="tasks" class="tab-pane fade in active">
            <ul>
                @foreach($repository as $row)
                    <li>{{$row->description}}</li>
                @endforeach
            </ul>
        </div>

        <div id="new_task" class="tab-pane fade">
            <form method="POST" action="{{route('task.store')}}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="control-label" for="description">Task Description</label>
                    <textarea name="description" rows="1" cols="50" id="description" class="form-control"
                              required="required"></textarea>
                </div>
                <button type="submit" class="btn btn-default btn-raised btn-success">
                    <i class="fa fa-save"></i> Add Task
                </button>
            </form>
        </div>
    </div>
@endsection
