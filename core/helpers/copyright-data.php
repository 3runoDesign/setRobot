<?php

function copyrightData($type = 'name')
{
    $type = (isset($type)) ? $type : 'name';

    return get_post_meta(get_post_thumbnail_id(), "setrobot_copyright_{$type}", true);
}
