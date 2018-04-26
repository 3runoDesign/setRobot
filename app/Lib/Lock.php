<?php

namespace App\Lib;

class Lock
{
    private $is_login_page;

    private $pages_array;


    private $get_login_url;
    private $get_register_url;
    private $get_lostpassword_url;
    private $get_resetpass_url;
    private $get_profile_user_url;

    /**
     * Lock constructor.
     */
    public function __construct()
    {

        $this->pages_array = [
            'login' => (new Utils())->create_page(['Login']),
            'register' => (new Utils())->create_page(['Register']),
            'lostpassword' => (new Utils())->create_page(['Lost Password']),
            'resetpass' => (new Utils())->create_page(['Reset Pass']),
            'profile_user' => (new Utils())->create_page(['Profile user']),
        ];


        $this->get_login_url = get_permalink($this->pages_array['login']->ID);
        $this->get_register_url = get_permalink($this->pages_array['register']->ID);
        $this->get_lostpassword_url = get_permalink($this->pages_array['lostpassword']->ID);
        $this->get_resetpass_url = get_permalink($this->pages_array['resetpass']->ID);
        $this->get_profile_user_url = get_permalink($this->pages_array['profile_user']->ID);
        $this->is_login_page = substr( $_SERVER['REQUEST_URI'], 0, 2 + strlen($this->pages_array['login']->post_name) ) === '/' . $this->pages_array['login']->post_name .'/';

        $this->subscribe();
    }


    /**
     * Does the reuqest parsing. Checks if the login page exists
     * and redirects the visitor to that same page if he is not logged in.
     *
     * @param mixed $wp
     * @return void
     */
    public function parse_request($wp)
    {
        if($this->is_login_page && is_user_logged_in()) {
            wp_redirect( home_url('?action=is_user_logged') );
            exit();
        }
    }

    /**
     * Redirect user to custom login page rather than wp-login.php
     */
    public function redirect_to_custom_login() {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : null;
            if(is_user_logged_in()) {
                $this->redirect_logged_in_user($redirect_to); // TODO: Redirects the user to the correct page depending on whether or not admin
                exit;
            }
            $login_url = $this->get_login_url;
            if(!empty($redirect_to)) {
                $login_url = add_query_arg('redirect_to', $redirect_to, $login_url);
            }
            wp_redirect($login_url);
            exit;
        }
    }

    /**
     * Redirect the user after authentication if there were any errors.
     *
     * @param Wp_User|Wp_Error  $user       The signed in user, or the errors that have occurred during login.
     * @param string            $username   The user name used to log in.
     * @param string            $password   The password used to log in.
     *
     * @return Wp_User|Wp_Error The logged in user, or error information if there were errors.
     */
    public function maybe_redirect_at_authenticate($user, $username, $password) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(is_wp_error($user)) {
                $error_codes = join(',', $user->get_error_codes());
                $login_url = $this->get_login_url;
                $login_url = add_query_arg('login', $error_codes, $login_url);
                wp_redirect($login_url);
                exit;
            }
        }
        return $user;
    }

    /**
     * Redirect to custom login page after user has been logged out
     */
    public function redirect_after_logout() {
        $redirect_url = $this->get_login_url;
        $redirect_url = add_query_arg('logged_out', 'true', $redirect_url);
        wp_safe_redirect($redirect_url);
        exit;
    }

    /**
     * Returns the URL to which the user should be redirected after the (successful) login.
     *
     * @param string           $redirect_to           The redirect destination URL.
     * @param string           $requested_redirect_to The requested redirect destination URL passed as a parameter.
     * @param WP_User|WP_Error $user                  WP_User object if login was successful, WP_Error object otherwise.
     *
     * @return string Redirect URL
     */
    public function redirect_after_login( $redirect_to, $requested_redirect_to, $user ) {
        $redirect_url = home_url();
        if ( ! isset( $user->ID ) ) {
            return $redirect_url;
        }
        if ( user_can( $user, 'manage_options' ) ) {
            // Use the redirect_to parameter if one is set, otherwise redirect to admin dashboard.
            if ( $requested_redirect_to == '' ) {
                $redirect_url = admin_url();
            } else {
                $redirect_url = $requested_redirect_to;
            }
        } else {
            // Non-admin users always go to their account page after login
            $redirect_url = $this->get_logged_in_url($user); // TODO: Redirects the user to the correct page depending on whether or not admin
        }
        return wp_validate_redirect( $redirect_url, home_url() );
    }

    /**
     * Redirects the user to the custom registration page instead
     * of wp-login.php?action=register.
     */
    public function redirect_to_custom_register() {
        if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
            if ( is_user_logged_in() ) {
                $this->redirect_logged_in_user(); // TODO: Redirects the user to the correct page depending on whether or not admin
            } else {
                wp_redirect( $this->get_register_url );
            }
            exit;
        }
    }

    /**
     * Handles the registration of a new user.
     *
     * Used through the action hook "login_form_register" activated on wp-login.php
     * when accessed through the registration action.
     */
    public function do_register_user() {
        if('POST' == $_SERVER['REQUEST_METHOD']) {
            $redirect_url = $this->get_register_url;
            if(!get_option('users_can_register')) {
                $redirect_url = add_query_arg('register-errors', 'closed', $redirect_url);
            } else if(empty($_POST['foobar'])) {
                $email = $_POST['email'];
                $first_name = sanitize_text_field($_POST['first_name']);
                $last_name = sanitize_text_field($_POST['last_name']);

                $result = $this->register_user($email, $first_name, $last_name);

                do_action('lock_after_register', $_POST, $result);

                if(is_wp_error($result)) {
                    $errors = join(',', $result->get_error_codes());
                    $redirect_url = add_query_arg('register-errors', $errors, $redirect_url);
                } else {
                    $redirect_url = $this->get_login_url;
                    $redirect_url = add_query_arg('registered', $email, $redirect_url);
                }
            }
            wp_redirect($redirect_url);
            exit;
        }
    }

    /**
     * Redirects the user to the custom "Forgot your password?" page instead of
     * wp-login.php?action=lostpassword.
     */
    public function redirect_to_custom_lostpassword() {
        if('GET' == $_SERVER['REQUEST_METHOD']) {
            if(is_user_logged_in()) {
                $this->redirect_logged_in_user(); // TODO: Redirects the user to the correct page depending on whether or not admin
                exit;
            }
            wp_redirect($this->get_lostpassword_url);
            exit;
        }
    }

    /**
     * Initiates password reset
     */
    public function do_password_lost() {
        if('POST' == $_SERVER['REQUEST_METHOD']) {
            $errors = retrieve_password();
            if(is_wp_error($errors)) {
                $redirect_url = $this->get_lostpassword_url;
                $redirect_url = add_query_arg('errors', join(',', $errors->get_error_codes()), $redirect_url);
            } else {
                $redirect_url = $this->get_login_url;
                $redirect_url = add_query_arg('checkemail', 'confirm', $redirect_url);
            }
            wp_redirect($redirect_url);
            exit;
        }
    }

    /**
     * Redirects to the custom password reset page, or the login page
     * if there are errors.
     */
    public function redirect_to_custom_resetpass() {
        if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
            // Verify key / login combo
            $user = check_password_reset_key( $_REQUEST['key'], $_REQUEST['login'] );
            if ( ! $user || is_wp_error( $user ) ) {
                if ( $user && $user->get_error_code() === 'expired_key' ) {
                    $redirect_url = $this->get_login_url;
                    $redirect_url = add_query_arg('login', 'expiredkey', $redirect_url);
                    wp_redirect( $redirect_url );
                } else {
                    $redirect_url = $this->get_login_url();
                    $redirect_url = add_query_arg('login', 'invalidkey', $redirect_url);
                    wp_redirect( $redirect_url );
                }
                exit;
            }
            $redirect_url = $this->get_resetpass_url;
            $redirect_url = add_query_arg( 'login', esc_attr( $_REQUEST['login'] ), $redirect_url );
            $redirect_url = add_query_arg( 'key', esc_attr( $_REQUEST['key'] ), $redirect_url );
            wp_redirect( $redirect_url );
            exit;
        }
    }

    /**
     * Resets the user's password if the password reset form was submitted.
     */
    public function do_password_reset() {
        if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
            $rp_key = $_REQUEST['rp_key'];
            $rp_login = $_REQUEST['rp_login'];

            $user = check_password_reset_key( $rp_key, $rp_login );

            if ( ! $user || is_wp_error( $user ) ) {
                if ( $user && $user->get_error_code() === 'expired_key' ) {
                    $redirect_url = $this->get_login_url;
                    $redirect_url = add_query_arg('login', 'expiredkey', $redirect_url);
                    wp_redirect( $redirect_url );
                } else {
                    $redirect_url = $this->get_login_url;
                    $redirect_url = add_query_arg('login', 'invalidkey', $redirect_url);
                    wp_redirect( $redirect_url );
                }
            }

            if ( isset( $_POST['pass1'] ) ) {
                if ( $_POST['pass1'] != $_POST['pass2'] ) {
                    // Passwords don't match
                    $redirect_url = $this->get_resetpass_url;
                    $redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
                    $redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
                    $redirect_url = add_query_arg( 'error', 'password_reset_mismatch', $redirect_url );
                    wp_redirect( $redirect_url );
                    exit;
                }
                if ( empty( $_POST['pass1'] ) ) {
                    // Password is empty
                    $redirect_url = $this->get_resetpass_url;

                    $redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
                    $redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
                    $redirect_url = add_query_arg( 'error', 'password_reset_empty', $redirect_url );

                    wp_redirect( $redirect_url );
                    exit;
                }
                // Parameter checks OK, reset password
                reset_password( $user, $_POST['pass1'] );
                $redirect_url = $this->get_login_url;
                $redirect_url = add_query_arg('password', 'changed', $redirect_url);
                wp_redirect( $redirect_url );
            } else {
                echo "Invalid request.";
            }
            exit;
        }
    }

    /**
     * Redirects the user to the correct page depending on whether or not admin
     *
     * @param string $redirect_to An optional redirect_to URL for admin users
     */
    private function redirect_logged_in_user($redirect_to = null) {
        $user = wp_get_current_user();
        if(user_can($user, 'manage_options')) {
            if($redirect_to) {
                wp_safe_redirect($redirect_to);
            } else {
                wp_redirect(admin_url());
            }
        } else {
            //TODO: add filter here or use settings page
            wp_redirect($this->get_logged_in_url($user));
        }
        exit;
    }

    /**
     * Get url for logged in users
     *
     * @return string The logged in redirect URL
     */
    function get_logged_in_url($user) {
        //TODO: Write settings page that takes pages and use their IDs
        /**
         * Filter to get custom logged in url
         *
         * @since 1.0.0
         *
         */
        return apply_filters('lock_logged_in_url', $this->get_profile_user_url, $user);
    }

//    public function registration_redirect() {
//        return redirect_logged_in_user(home_url(/));
//    }

    /**
     * Subscribe to WordPress hooks
     *
     * * @return void
     */
    private function subscribe()
    {
        // Login hooks
        add_action('login_form_login', [$this, 'redirect_to_custom_login']);
        add_filter('authenticate', [$this, 'maybe_redirect_at_authenticate'], 101, 3);
        add_action('wp_logout', [$this, 'redirect_after_logout']);
        add_filter('login_redirect', [$this, 'redirect_after_login'], 10, 3);
        add_action( 'parse_request', array( &$this, 'parse_request' ) );

        // Register hooks
        add_action('login_form_register', [$this, 'redirect_to_custom_register']);
        add_action('login_form_register', [$this, 'do_register_user']);
//        add_filter('registration_redirect', [$this, 'registration_redirect']);

        // Reset/Lost password hooks
        add_action('login_form_lostpassword', [$this, 'redirect_to_custom_lostpassword']);
        add_action('login_form_lostpassword', [$this, 'do_password_lost']);
        add_action('login_form_rp', [$this, 'redirect_to_custom_resetpass']);
        add_action('login_form_resetpass', [$this, 'redirect_to_custom_resetpass']);
        add_action('login_form_rp', [$this, 'do_password_reset']);
        add_action('login_form_resetpass', [$this, 'do_password_reset']);
    }
}
