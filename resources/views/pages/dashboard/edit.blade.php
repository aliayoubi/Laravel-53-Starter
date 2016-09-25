@extends('layouts.app')

@section('title', $title)

@section('content')

    <form method="POST" action="{{route('task.update', [$task])}}">
        {{ csrf_field() }}
        {{method_field('PATCH')}}

        <div class="form-group">
            <label class="control-label" for="description">Task Description</label>
                    <textarea name="description" rows="1" cols="50" id="description" class="form-control"
                              required="required">{{$task->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Save
        </button>
    </form>

@endsection

