@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">

            <div class="z-depth-1 card-panel grey lighten-4 row hoverable"
                 style="padding: 10px 30px 30px 30px; border: 1px solid #EEE;">
                <h5 class="blue-text">Reset Password</h5>
                <div class="divider"></div>

                @if (session('status'))
                    @push('scripts')
                    <script>
                        var $toastContent = $('{{ session('status') }}');
                        Materialize.toast($toastContent, 5000);
                    </script>
                    @endpush
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                    {{ csrf_field() }}

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

                    <div class="center-align">
                        <button type="submit" class="btn btn-primary">
                            <i class="material-icons left">send</i> Send Password Reset Link
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
