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
            My Tasks
        </div>

        <div id="new_task" class="tab-pane fade">
            {!! BootForm::open()->post()->action(route('task.store') ) !!}
            {!! BootForm::textarea('Task Description', 'description')->rows(1)->required() !!}
            {!! BootForm::submit('<i class="material-icons">send</i> Add Task')
            ->addClass('btn-raised')
            ->addClass('btn-success')
            !!}
            {!! BootForm::close() !!}
        </div>
    </div>
@endsection
