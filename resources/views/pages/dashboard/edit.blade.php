@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')

    <form method="POST" action="{{route('task.update', [$task])}}">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="control-label" for="description">Task Description</label>
                    <textarea name="description" rows="1" cols="50" id="description" class="form-control"
                              required="required">{{$task->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-default btn-raised btn-success">
            <i class="fa fa-save"></i> Update
        </button>
    </form>

@endsection

