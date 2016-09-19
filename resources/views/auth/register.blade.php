@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="z-depth-1 card-panel grey lighten-4 row hoverable"
                 style="padding: 10px 30px 30px 30px; border: 1px solid #EEE;">
                <h5 class="blue-text"><i class="material-icons left">perm_identity</i> Create Account</h5>
                <div class="divider"></div>

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}

                    <div class='input-field col s12'>

                        <input id="name" type="text" class="validate" name="name"
                               value="{{ old('name') }}" required autofocus>

                        <label for="name" data-error="Name is required" class="control-label">Name</label>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif

                    </div>

                    <div class='input-field col s12'>
                        <input autocomplete="off" id="email" type="email" class="validate" name="email"
                               value="{{ old('email') }}" required>

                        <label for="email" data-error="Wrong Email Type">E-Mail
                            Address</label>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class='input-field col s12'>
                        <input autocomplete="off" id="password" type="password" class="validate" name="password" required>
                        <label for="password" data-error="Invalid Password">Password</label>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class='input-field col s12'>
                        <input autocomplete="off" id="password-confirm" type="password" class="validate"
                               name="password_confirmation" required>

                        <label for="password-confirm" data-error="Invalid Password" class="control-label">Confirm Password</label>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="center-align">
                        <button type="submit" class="btn btn-primary">
                            <i class="material-icons left">send</i> Register
                        </button>
                    </div>

                    <div class="right">
                        <a class="waves-effect btn-flat pink-text" href="{{ url('/login') }}">
                            Sign In
                        </a>
                    </div>

                </form>
            </div>
        </div>
@endsection
