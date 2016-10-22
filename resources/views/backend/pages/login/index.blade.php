<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <!-- The above 3 meta tags *must* come first in the head -->
    <meta name="description" content="{{config('app.name')}}">
    <meta name="author" content="Sarfraz Ahmed">
    <link rel="shortcut icon" href="/favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>

    {!! Packer::css([
    '/backend/css/bootstrap/css/bootstrap.min.css',
    '/common/css/checkbox3.min.css',
    ],
    '/storage/backend/cache/css/')
    !!}

    <link rel="stylesheet" href="/common/css/animate.css">

    <style>
        .panel {
            margin-top: 100px;
        }
    </style>

    <script>
        window.Laravel = <?=json_encode(['csrfToken' => csrf_token()]); ?>
    </script>
</head>

<body class="animated fadeIn">

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="glyphicon glyphicon-lock"></i> Account Details
                </div>

                <div class="panel-body">
                    @include('shared.errors')

                    <form role="form" method="POST" action="{{ url('admin/login') }}">
                        {{ csrf_field() }}

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input required autocomplete="off" class="form-control" autofocus
                                   placeholder="E-mail Address"
                                   value="{{ old('email') }}"
                                   name="email"
                                   id="email"
                                   type="email">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input required autocomplete="off" class="form-control" placeholder="Password"
                                   name="password"
                                   id="password"
                                   type="password" value="">
                        </div>
                        <br>
                        <div class="checkbox3 checkbox-primary checkbox-inline checkbox-check checkbox-round">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                        <br>
                        <div align="center">
                            <button style="margin-left: -1px;" class="btn btn-block btn-primary" type="submit">
                                <span class="glyphicon glyphicon-log-in"></span> Sign In
                            </button>

                            <br>
                            <a href="{{ url('/password/reset') }}">Forgot Password</a>
                        </div>
                    </form>

                </div>
            </div>
            <div class="well text-center">
                <strong><i class="fa fa-info-circle"></i> Don't have an account? <a href="{{ url('/register') }}">Sign Up</a></strong>
            </div>
        </div>
    </div>
</div>

{!! Packer::js([
'/common/js/jquery.js',
'/backend/css/bootstrap/js/bootstrap.min.js',
],
'/storage/backend/cache/js/')
!!}

</body>
</html>
