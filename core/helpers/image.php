<?php

function getImageURL($url)
{
    return get_template_directory_uri() . '/assets/images/' . $url;
}
