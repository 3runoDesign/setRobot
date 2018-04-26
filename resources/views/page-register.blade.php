@extends('layouts.lock')

@section('content')

    @php
        $err = '';
        $success = '';

        global $wpdb, $PasswordHash, $current_user, $user_ID;

        if(isset($_POST['task']) && $_POST['task'] == 'register' ) {

            $pwd1 = esc_sql(trim($_POST['pwd1']));
            $pwd2 = esc_sql(trim($_POST['pwd2']));
            $first_name = esc_sql(trim($_POST['first_name']));
            $last_name = esc_sql(trim($_POST['last_name']));
            $email = esc_sql(trim($_POST['email']));
            $username = esc_sql(trim($_POST['username']));

            if( $email == "" || $pwd1 == "" || $pwd2 == "" || $username == "" || $first_name == "" || $last_name == "") {
                $err = __("Please don't leave the required fields.");
            } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $err = __('Invalid email address.');
            } else if(email_exists($email) ) {
                $err = __('Email already exist.');
            } else if($pwd1 <> $pwd2 ) {
                $err = __('Password do not match.');
            } else {

                $user_id = wp_insert_user( array ('first_name' => apply_filters('pre_user_first_name', $first_name), 'last_name' => apply_filters('pre_user_last_name', $last_name), 'user_pass' => apply_filters('pre_user_user_pass', $pwd1), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber' ) );
                if( is_wp_error($user_id) ) {
                    $err = __('Error in creating the user.', "setrobot");
                } else {
                    // wp_set_current_user( $user_id, $username );
                    // wp_set_auth_cookie( $user_id );
                    // do_action( 'wp_login', $username );

                    do_action('user_register', $user_id);

                    wp_redirect(add_query_arg( 'registered', '', get_permalink(get_page_by_title( 'Login' )->ID)));
                    exit();

                    // $success = __("Your registration created successfully.", "setrobot");
                }

            }

        }
    @endphp

    @mainquery

    @if (!$user_ID && get_option('users_can_register'))
        @if ( !empty($err) )
            <div class="login-notification notification is-warning">
                <button class="delete"></button>
                <p>{{ $err }}</p>
            </div>
        @endif

        @if ( !empty($success) )
            <div class="login-notification notification is-success">
                <button class="delete"></button>
                <p>{{ $success }}</p>
            </div>
        @endif


        {{-- TODO: Adicionar notifications --}}
        <div class="login-container">
            <h1 class="title">
                {{ __('Don\'t have an account?', 'setrobot') }}
            </h1>
            <h2 class="subtitle">
                {{ __('Create one now.', 'setrobot') }}
            </h2>

            <form method="post">
                <p>
                    <label for="first_name">{{ __("First Name", "setrobot") }}</label>
                    <input type="text" value="" class="input" name="first_name" id="first_name" />
                </p>
                <p>
                    <label for="last_name">{{ __("Last Name", "setrobot") }}</label>
                    <input type="text" value="" class="input" name="last_name" id="last_name" />
                </p>
                <p>
                    <label for="email">{{ __("Email", "setrobot") }}</label>
                    <input type="text" value="" class="input" name="email" id="email" />
                </p>
                <p>
                    <label for="username">{{ __("Username", "setrobot") }}</label>
                    <input type="text" value="" class="input" name="username" id="username" />
                </p>
                <p>
                    <label for="pwd1">{{ __("Password", "setrobot") }}</label>
                    <input type="password" value="" class="input" name="pwd1" id="pwd1" />
                </p>
                <p>
                    <label for="pwd2">{{ __("Password again", "setrobot") }}</label>
                    <input type="password" value="" class="input" name="pwd2" id="pwd2" />
                </p>

                <button type="submit" name="btnregister" class="button is-danger is-medium" >{{ __("Submit", "setrobot") }}</button>
                <input type="hidden" name="task" value="register" />

                <div class="tabs is-small is-right is-toggle">
                    <ul>
                        <li><a href="{{ wp_login_url() }}">{{ __("Login with my credentials", "setrobot") }}</a></li>
                    </ul>
                </div>
            </form>

        </div>
    @else
        @php
            wp_redirect( home_url() );
            exit;
        @endphp
    @endif
    @endmainquery
@endsection
