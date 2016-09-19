@extends('layouts.app')

@section('title')
    <h1 class="page-title orange-text">Dashboard</h1>
    <div class="divider"></div>
@endsection

@section('content')
    <div class="row">
        <div class="col s12">
            <ul class="tabs z-depth-1">
                <li class="tab col s6"><a class="active" href="#users">Users</a></li>
                <li class="tab col s6"><a href="#tasks">Tasks</a></li>
            </ul>
        </div>
        <div class="section"></div>
        <div class="section"></div>

        <div id="users" class="col s12 card-panel">
            <ul>
                <li>Users List</li>
                <li>Show count of assigned tasks to each user</li>
                <li>View Assigned Tasks</li>
                <li>Delete User</li>
            </ul>
        </div>
        <div id="tasks" class="col s12 card-panel">
            <ul>
                <li>Tasks List</li>
                <li>Create Task and Assign to User</li>
                <li>Edit Task</li>
                <li>Delete Task</li>
            </ul>
        </div>
    </div>
@endsection
