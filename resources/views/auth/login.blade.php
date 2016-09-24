@extends('layouts.app')

@section('title')
    Login to Your Account
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-lock"></i> Login Details</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" autocomplete="off" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" autocomplete="off" type="password" class="form-control"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4"></div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="checkbox3 checkbox-primary checkbox-inline checkbox-check checkbox-round">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">Remember Me</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-raised">
                                    <i class="fa fa-paper-plane"></i> Login Now
                                </button>
                            </div>
                            <br>

                            <div class="pull-left">
                                <a class="btn" href="{{ url('/password/reset') }}">
                                    Forgot Password
                                </a>
                            </div>

                            <div class="pull-right">
                                <a class="btn" href="{{ url('/register') }}">
                                    Create Account
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
