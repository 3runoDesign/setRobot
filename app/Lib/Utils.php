<?php

namespace App\Lib;

class Utils
{
    /**
     * Create pages default
     * @param array $pages
     */
    public function create_page(array $pages)
    {
        foreach ($pages as $singlepage) {
            $page = [
                'post_title' => $singlepage,
                'post_content' => '',
                'post_status' => 'publish',
                'post_type' => 'page'
            ];

            $page_exists = get_page_by_title($page['post_title']);

            if ($page_exists == null) {


                wp_insert_post($page);

                return $page;
            }

            return $page_exists;

        }
    }

    /**
     * @param array $pages ['front_page' and 'blog_page']
     */
    public function setting_frontpage(array $pages_title)
    {
        // default options
        $setting_page = [
            'front_page' => 'Home',
            'blog_page' => 'Blog'
        ];

        $setting_page = array_replace_recursive($setting_page, $pages_title);

        if (get_page_by_title($setting_page['front_page']) && get_page_by_title($setting_page['blog_page'])) {
            update_option('show_on_front', 'page');

            update_option('page_on_front', get_page_by_title($setting_page['front_page'])->ID);
            update_option('page_for_posts', get_page_by_title($setting_page['blog_page'])->ID);
        }
    }

    /**
     * Make a URL relative
     */
    public function root_relative_url($input)
    {
        if (is_feed()) {
            return $input;
        }
        $url = parse_url($input);
        if (!isset($url['host']) || !isset($url['path'])) {
            return $input;
        }
        $site_url = parse_url(network_home_url());  // falls back to home_url
        if (!isset($url['scheme'])) {
            $url['scheme'] = $site_url['scheme'];
        }
        $hosts_match = $site_url['host'] === $url['host'];
        $schemes_match = $site_url['scheme'] === $url['scheme'];
        $ports_exist = isset($site_url['port']) && isset($url['port']);
        $ports_match = ($ports_exist) ? $site_url['port'] === $url['port'] : true;
        if ($hosts_match && $schemes_match && $ports_match) {
            return wp_make_link_relative($input);
        }
        return $input;
    }

    /**
     * Compare URL against relative URL
     */
    public function url_compare($url, $rel)
    {
        $url = trailingslashit($url);
        $rel = trailingslashit($rel);
        return ((strcasecmp($url, $rel) === 0) || root_relative_url($url) == $rel);
    }

    /**
     * Hooks a single callback to multiple tags
     */
    public function add_filters($tags, $function, $priority = 10, $accepted_args = 1)
    {
        foreach ((array)$tags as $tag) {
            add_filter($tag, $function, $priority, $accepted_args);
        }
    }

    /**
     * Display error alerts in admin panel
     */
    public function alerts($errors, $capability = 'activate_plugins')
    {
        if (!did_action('init')) {
            return add_action('init', function () use ($errors, $capability) {
                alerts($errors, $capability);
            });
        }
        $alert = function ($message) {
            echo '<div class="error"><p>' . $message . '</p></div>';
        };
        if (call_user_func_array('current_user_can', (array)$capability)) {
            add_action('admin_notices', function () use ($alert, $errors) {
                array_map($alert, (array)$errors);
            });
        }
    }

    public function get_error_message($error_code) {
    switch($error_code) {
      case 'empty_username':
        return __('Email was blank', 'setrobot');
        case 'empty_password':
            return __( 'Password was blank', 'setrobot' );
        case 'invalid_username':
            return __(
                "Something did not work. <a href='%s'>Do you want to recover your account?</a>",
                'setrobot'
            );
        case 'incorrect_password':
            $err = __(
                "Something did not work. <a href='%s'>Do you want to recover your account?</a>",
                'setrobot'
            );
            return sprintf( $err, wp_lostpassword_url() );

        // Registration errors
        case 'email':
          return __( 'The email address you entered is not valid.', 'setrobot' );

        case 'email_exists':
          return __( 'An account exists with this email address.', 'setrobot' );

        case 'closed':
          return __( 'Registering new users is currently not allowed.', 'setrobot' );

        // Lost password
        case 'empty_username':
            return __( 'You need to enter your email address to continue.', 'setrobot' );

        case 'invalid_email':
        case 'invalidcombo':
            return __( 'There are no users registered with this email address.', 'setrobot' );

        // Reset password
        case 'expiredkey':
        case 'invalidkey':
            return __( 'The password reset link you used is not valid anymore.', 'setrobot' );
        case 'password_reset_mismatch':
            return __( "The two passwords you entered don't match.", 'setrobot' );
        case 'password_reset_empty':
            return __( "Sorry, we don't accept empty passwords.", 'setrobot' );
        case 'entered_successfully':
            return __( "You have successfully logged in!", 'setrobot' );
        default:
            break;
    }
    return __( 'An unknown error occurred. Please try again later.', 'setrobot' );
  }
}
