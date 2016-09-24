@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')

    <div class="well text-center col-md-8 col-md-offset-2">
        <h1>{{config('app.name')}}</h1>
        <p class="padded">
            Laravel 5.3 Starter project with Bootstrap CSS framework and useful packages needed for most apps
        </p>
        <p>
            @if (Auth::guest())
                <a class="btn btn-lg btn-success btn-raised" href="{{ url('/register') }}" role="button">
                    <i class="fa fa-paper-plane"></i> Get Started!
                </a>
            @else
                <a class="btn btn-lg btn-success btn-raised" href="{{route('dashboard')}}" role="button">
                    <i class="fa fa-paper-plane"></i> Dashboard
                </a>
            @endif
        </p>
    </div>

@endsection
