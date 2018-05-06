@extends('layouts.lock')

@section('content')

    @mainquery
        @php
            $errors = [];
            $attributes = [];

            if(isset($_REQUEST['login'])) {
                $error_codes = explode(',', $_REQUEST['login']);
                foreach($error_codes as $code) {
                    $errors[] = (new \App\Lib\Utils())->get_error_message($code);
                }
            }
            $attributes['redirect'] = home_url('?msg=entered_successfully');
            $attributes['remember'] = false;


            if(isset($_REQUEST['redirect_to'])) {
                $attributes['redirect'] = wp_validate_redirect($_REQUEST['redirect_to'], $attributes['redirect']);
            }

            $attributes['registered'] = isset( $_REQUEST['registered'] );
            $attributes['lost_password_sent'] = isset( $_REQUEST['checkemail'] ) && $_REQUEST['checkemail'] == 'confirm';
            $attributes['logged_out'] = isset($_REQUEST['logged_out']) && isset( $_REQUEST['logged_out'] ) && $_REQUEST['logged_out'] == true;
            $attributes['password_updated'] = isset( $_REQUEST['password'] ) && $_REQUEST['password'] == 'changed';
        @endphp

        @if (count( $errors ) > 0)
            @section('notification')
                @component('components.notification-area', ['class' => 'warning'])
                    <ul>
                        @foreach ($errors as $error)
                            <li>
                                {!! $error !!}
                            </li>
                        @endforeach
                    </ul>
                @endcomponent
            @endsection
        @endif

        {{--Show success message if user just registered--}}
        @if ($attributes['registered'])
            @php
                $msg_registered = __(
                    "You have successfully registered to <strong>%s</strong>.",
                    'setrobot'
                );
            @endphp

            @section('notification')
                @component('components.notification-area', ['class' => 'info'])
                    <ul>
                        <li>
                            {!! sprintf( $msg_registered, get_bloginfo( 'name' ) ) !!}
                        </li>
                    </ul>
                @endcomponent
            @endsection
        @endif

        {{--Show logged out message if user just logged out--}}
        @if ($attributes['logged_out'])
            @section('notification')
                @component('components.notification-area', ['class' => 'info'])
                    <ul>
                        <li>
                            {{ __('You have signed out. Would you like to sign in again?', 'setrobot') }}
                        </li>
                    </ul>
                @endcomponent
            @endsection
        @endif

        {{--Show success message if user sent a password reset email--}}
        @if ($attributes['lost_password_sent'])
            @section('notification')
                @component('components.notification-area', ['class' => 'info'])
                    <ul>
                        <li>
                            {{ __('Check your email for a link to reset your password.', 'setrobot') }}
                        </li>
                    </ul>
                @endcomponent
            @endsection
        @endif

        {{--Show success message if user updated their password--}}
        @if ($attributes['password_updated'])
            @section('notification')
                @component('components.notification-area', ['class' => 'info'])
                    <ul>
                        <li>
                            {{ __('Your password has been changed. You can sign in now.', 'setrobot') }}
                        </li>
                    </ul>
                @endcomponent
            @endsection
        @endif

        <div class="login-container">
            <h1 class="title">
                {{ __('Login', 'setrobot') }}
            </h1>
            <h2 class="subtitle">{{ __('Enter your credential', 'setrobot') }}</h2>

            <form name="loginform" id="loginform" action="{{ wp_login_url() }}" method="post">
                <p class="login-username">
                    <label for="user">{{ __('Username:', 'setrobot') }}</label>
                    <input type="text" name="log" id="user" value="" size="20" class="input">
                </p>
                <p class="login-password"><label for="pass">{{ __("Password:", "setrobot") }}</label>
                    <input type="password" name="pwd" id="pass" value="" size="20" class="input">
                </p>

                <p class="login-submit">
                    <span class="buttons">
                        <input type="submit" name="wp-submit" id="wp-submit" value="{{ __("Login", "setrobot") }}" class="button is-primary is-medium">

                        @if(get_option('users_can_register'))
                            <a href="{{ wp_registration_url() }}" class="button is-medium">{{ __("Register", "setrobot") }}</a>
                        @endif
                    </span>

                    <input type="hidden" name="redirect_to" value="{{ $attributes['redirect'] }}">
                </p>

                @if($attributes['remember'])
                    <p class="login-remember clear-style">
                        <label class="checkbox">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever">
                            {{ __("Remember Me Forgot your password?", "setrobot") }}
                        </label>
                    </p>
                @endif

                <div class="tabs is-small is-toggle is-right">
                    <ul>
                        <li><a href="{{ wp_lostpassword_url() }}">{{ __("Lost Password?", "setrobot") }}</a></li>
                        <li><a href="{{ home_url() }}">{{ __("Back to home", "setrobot") }}</a></li>
                    </ul>
                </div>
            </form>
        </div>
    @endmainquery
@endsection
