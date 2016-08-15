<?php

function copyrightData($id_img, $type = 'name')
{
    $type = (isset($type)) ? $type : 'name';

    return get_post_meta($id_img, "setrobot_copyright_{$type}", true);
}
