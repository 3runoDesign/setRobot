<?php


namespace App;

class Lock
{
    /**
     * @var WP_Post
     */
    private $login_page;
    /**
     * @var string
     */
    private $login_page_url;
    /**
     * @var bool
     */
    private $is_login_page;
    /**
     * Constructor function
     */
    public function __construct(\WP_Post $login_page = null)
    {
        $this->login_page = $login_page;
        $this->login_page_url = get_permalink($this->login_page->ID);
        $this->is_login_page = substr($_SERVER['REQUEST_URI'], 0, 2 + strlen($this->login_page->post_name)) === '/' . $this->login_page->post_name .'/';
        $this->subscribe();
    }
    /**
     * Does the reuqest parsing. Checks if the login page exists
     * and redirects the visitor to that same page if he is not logged in.
     *
     * @param mixed $wp
     * @return void
     */
    public function parseRequest($wp)
    {
        if (! $this->login_page) {
            die('Login page doesn\'t exist.');
        }
        if (! is_user_logged_in() && ! $this->is_login_page) {
            wp_redirect($this->login_page_url);
            exit();
        }
    }

    /**
     * Verifies username and password. Redirects visitor
     * to the login page with login empty status if
     * eather username or password is empty.
     *
     * @param mixed $user
     * @param string $username
     * @param string $password
     */
    public function verifyUsernamePassword($user, $username, $password)
    {
        if ($username == "" || $password == "") {
            wp_redirect($this->login_page_url . "?login=empty");
            exit();
        }
    }
    /**
     * Redirects visitor to the login page with login
     * failed status.
     *
     * @return void
     */
    public function loginFailed()
    {
        wp_redirect($this->login_page_url . '?login=failed');
        exit();
    }
    /**
     * Redirects visitor to the login page with login
     * success status.
     *
     * @return void
     */
    public function logout()
    {
        wp_redirect($this->login_page_url . '?logout=success');
        exit();
    }
    /**
     * Subscribe to WordPress hooks
     *
     * @return void
     */
    private function subscribe()
    {
        add_filter('authenticate', array(&$this, 'verifyUsernamePassword'), 1, 3);
        // add_action('parseRequest', array(&$this, 'parseRequest'));
        add_action('wp_login_failed', array(&$this, 'loginFailed'));
        add_action('wp_logout', array(&$this, 'logout'));
    }
}
