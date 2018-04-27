@extends('layouts.lock')

@section('content')

    @php
        global $user;
        wp_enqueue_script('utils');
        wp_enqueue_script('user-profile');
        wp_admin_css( 'login', true );
        wp_enqueue_script('user-profile');

        $attributes = [];

        if ( isset( $_REQUEST['login'] ) && isset( $_REQUEST['key'] ) ) {
            $attributes['login'] = $_REQUEST['login'];
            $attributes['key'] = $_REQUEST['key'];

            // Error messages
            $errors = [];

            if ( isset( $_REQUEST['error'] ) ) {
                $error_codes = explode( ',', $_REQUEST['error'] );

                foreach ( $error_codes as $code ) {
                    $errors []= ((new App\Lib\Utils())->get_error_message($code));
                }
            }

            $attributes['errors'] = $errors;
        } else {
            wp_redirect(home_url());
            exit;
        }
    @endphp


    @mainquery

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
            <h1 class="title">
                {{ __('Pick a New Password', 'setrobot') }}
            </h1>

            <form name="resetpassform" id="resetpassform"
                  action="{{ esc_url( network_site_url( 'wp-login.php?action=resetpass', 'login_post' ) ) }}"
                  method="post" autocomplete="off">


                <div class="user-pass1-wrap">

                    <div class="wp-pwd">
                            <span class="password-input-wrapper">
                                <input type="password" data-reveal="1"
                                       data-pw="{{ esc_attr( wp_generate_password( 16 ) ) }}" name="pass1" id="pass1"
                                       class="input" size="20" value="" autocomplete="off"
                                       aria-describedby="pass-strength-result"/>
                            </span>

                        <div id="pass-strength-result" class="hide-if-no-js" aria-live="polite">
                            {{ __('Strength indicator', 'setrobot') }}
                        </div>
                    </div>

                </div>

                <p class="user-pass2-wrap">
                    <label for="pass2">{{ __( 'Confirm new password', 'setrobot') }}</label><br/>
                    <input type="password" name="pass2" id="pass2" class="input" size="20" value=""
                           autocomplete="off"/>
                </p>

                <p class="description indicator-hint">{{ wp_get_password_hint() }}</p>

                @php
                    /**
                    * Fires following the 'Strength indicator' meter in the user password reset form.
                    *
                    * @since 3.9.0
                    *
                    * @param WP_User $user User object of the user whose password is being reset.
                    */
                    do_action( 'resetpass_form', $user );
                @endphp

                <input type="hidden" name="rp_key" value="{{ esc_attr( $attributes['key'] ) }}"/>
                <input type="hidden" name="rp_login" id="user_login"
                       value="{{ esc_attr( $attributes['login'] ) }}" autocomplete="off"/>
                <p class="submit">
                    <input type="submit" name="wp-submit" id="wp-submit"
                           class="button is-primary is-medium"
                           value="{{ esc_attr_e('Reset Password') }}"/>
                </p>

                <div class="tabs is-small is-right is-toggle">
                    <ul>
                        <li>
                            <a href="{{ home_url() }}">{{ __("Back to home", "setrobot") }}</a>
                        </li>
                    </ul>
                </div>
            </form>

        </div>
    @endmainquery
@endsection

@push('footer-script')
    <script>
        (function ($) {
            var login_form = '.login-container form';
            var input_form = $(login_form + ' input[type="text"], ' + login_form + ' input[type="password"]');

            $(input_form[0]).focus();
            $(input_form[0]).parent().addClass('focused');

            input_form.each(function (e) {
                $(this).on('focusin', function (e) {
                    $(this.form).find('.focused').removeClass('focused');
                    $(this).parent('p').addClass('focused');
                })
            });

            @isset($_GET['logout'])
            @if ($_GET['logout'] == 'success')
            setTimeout("location.href = '{{ get_bloginfo("url") }}';", 2000);
            @endif
            @endisset
        })(jQuery);
    </script>
@endpush

@push('styles-head')
    <style lang='scss'>
        body {
            background-image: url({{ get_field('background_login', 'option') ?
                                    get_field('background_login', 'option') :
                                    'https://images.pexels.com/photos/296881/pexels-photo-296881.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260'}}) !important;
        }
    </style>
@endpush
