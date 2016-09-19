@extends('layouts.app')

@section('content')
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <h1 class="header center orange-text">Laravel Starter</h1>
            <div class="row center">
                <h5 class="header col s12 light">
                    Laravel 5.3 Starter project with MaterializeCSS framework and useful packages needed for most apps
                </h5>
            </div>
            <div class="row center">
                <a href="{{ url('/register') }}" id="download-button" class="btn-large waves-effect waves-light orange">
                    Create Account
                </a>
            </div>
            <br><br>

        </div>
    </div>

    <div class="section">
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
                    <h5 class="center">Speed Up Development</h5>

                    <p class="light">
                        We did most of the heavy lifting for you to provide common set of packages needed for most apps.
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                    <h5 class="center">User Experience</h5>

                    <p class="light">
                        With Material Design, a single responsive system across all platforms allow for a more
                        unified user experience.
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
                    <h5 class="center">Easy to Work</h5>

                    <p class="light">
                        It contains sample application out of box which demonstrates the use of
                        most of the included packages.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
