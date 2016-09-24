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
            {!! $dataTable->table(['class' => 'table table-striped table-bordered table-hover dt-responsive nowrap']) !!}
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
                    <i class="fa fa-save"></i> Update
                </button>
            </form>
        </div>
    </div>

    @include('popups.delete_confirm')
@endsection

@include('shared.datatables_export')