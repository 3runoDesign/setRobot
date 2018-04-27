@extends('layouts.lock')

@section('content')

    @mainquery
        @php
            $errors = [];
            if(isset($_REQUEST['errors'])) {
                $error_codes = explode(',', $_REQUEST['errors']);
                foreach($error_codes as $code) {
                    $errors[] = (new \App\Lib\Utils())->get_error_message($code);
                }
            }
        @endphp

        @if (count( $errors ) > 0)
            <div class="login-notification notification is-warning">
                <button class="delete"></button>
                <ul>
                    @foreach ($errors as $error)
                        <li>
                            {!! $error !!}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-container">

            <h1 class="title">{{ __('Lost password', 'setrobot') }}</h1>
            <h2 class="subtitle">
                {{ __('Enter your email address and we\'ll send you a link you can use to reset your password.', 'setrobot') }}
            </h2>

            <form id="lostpasswordform" action="{{ wp_lostpassword_url() }}" method="post">
                <p class="form-row">
                    <label for="user_login">{{ __( 'Email', 'setrobot' ) }}</label>
                    <input type="text" class="input" name="user_login" id="user_login">
                </p>

                <p class="submit">
                    <button type="submit" name="submit" class="button is-primary is-medium">
                        {{ __("Reset Password", "setrobot") }}
                    </button>
                </p>

                <div class="tabs is-toggle is-small is-right">
                    <ul>
                        <li><a href="{{ wp_login_url() }}">{{ __("Login with my credentials", "setrobot") }}</a></li>
                        <li><a href="{{ home_url() }}">{{ __("Back to home", "setrobot") }}</a></li>
                    </ul>
                </div>
            </form>
        </div>
    @endmainquery
@endsection

