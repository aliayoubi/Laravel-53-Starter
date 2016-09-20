@extends('layouts.app')

@section('title')
    Welcome!
@endsection
@section('content')

    <div class="well text-center col-md-8 col-md-offset-2">
        <h1>{{config('app.name')}}</h1>
        <p>
            Laravel 5.3 Starter project with MaterializeCSS framework and useful packages needed for most apps
        </p>
        <p>
            <a class="btn btn-lg btn-success btn-raised" href="{{ url('/register') }}" role="button">Get Started!</a>
        </p>
    </div>

@endsection
