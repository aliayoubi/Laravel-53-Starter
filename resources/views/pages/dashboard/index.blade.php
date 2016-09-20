@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#users">Users</a></li>
        <li><a data-toggle="tab" href="#tasks">Tasks</a></li>
    </ul>
    <br>
    <div class="tab-content">
        <div id="users" class="tab-pane fade in active">
            <ul>
                <li>Users List</li>
                <li>Show count of assigned tasks to each user</li>
                <li>View Assigned Tasks</li>
                <li>Delete User</li>
            </ul>
        </div>
        <div id="tasks" class="tab-pane fade">
            <ul>
                <li>Tasks List</li>
                <li>Create Task and Assign to User</li>
                <li>Edit Task</li>
                <li>Delete Task</li>
            </ul>
        </div>
    </div>
@endsection
