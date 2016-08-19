<?php

function failed_login()
{
    return 'Seu usuário ou senha informados estão incorretos.';
}
add_filter('login_errors', 'failed_login');
