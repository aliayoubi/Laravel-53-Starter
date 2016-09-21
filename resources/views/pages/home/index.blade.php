@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')

    <div class="well text-center col-md-8 col-md-offset-2">
        <h1>{{config('app.name')}}</h1>
        <p>
            Laravel 5.3 Starter project with Bootstrap CSS framework and useful packages needed for most apps
        </p>
        <p>
            <a class="btn btn-lg btn-success btn-raised" href="{{ url('/register') }}" role="button"><i
                        class="material-icons">send</i> Get Started!</a>
        </p>
    </div>

@endsection
