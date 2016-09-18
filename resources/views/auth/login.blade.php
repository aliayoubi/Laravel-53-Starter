@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @if (count($errors) > 0)
                <div class="alert alert-danger animated shake">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="z-depth-1 card-panel grey lighten-4 row hoverable"
                 style="padding: 10px 30px 30px 30px; border: 1px solid #EEE;">
                <h5 class="blue-text">Sign In To Your Account</h5>

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class='input-field col s12'>
                        <i class="prefix material-icons">email</i>
                        <input id="email" type="email" class="validate form-control" name="email"
                               value="{{ old('email') }}" required autofocus>

                        <label for="email" data-error="Wrong Email Type">E-Mail
                            Address</label>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class='input-field col s12'>
                        <i class="prefix material-icons">lock_outline</i>
                        <input id="password" type="password" class="form-control" name="password"
                               required>
                        <label for="password" data-error="Invalid Password">Password</label>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class='row'>
                        <div class='input-field col s12 m12 l12 login-text'>
                            <i class="prefix"></i>
                            <input type="checkbox" name="remember" id="remember-me">
                            <label for="remember-me">Remember Me</label>
                        </div>
                    </div>

                    <div class="section"></div>

                    <div class="center-align">
                        <button type="submit" class="btn waves-effect">
                            <i class="material-icons left">send</i> Sign In
                        </button>
                    </div>

                    <div class="section"></div>

                    <div class="left">
                        <a class="waves-effect waves-teal btn-flat pink-text" href="{{ url('/password/reset') }}">
                            Forgot Password
                        </a>
                    </div>

                    <div class="right">
                        <a class="waves-effect waves-teal btn-flat pink-text" href="{{ url('/register') }}">
                            Create Account
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
