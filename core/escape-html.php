<?php

function escapeHTML($arr) {

    if (version_compare(PHP_VERSION, '5.2.3') >= 0) {

        $output = htmlspecialchars($arr[2], ENT_NOQUOTES, get_bloginfo('charset'), false);
    }
    else {
        $specialChars = array(
            '&' => '&amp;',
            '<' => '&lt;',
            '>' => '&gt;'
        );

        // decode already converted data
        $data = htmlspecialchars_decode($arr[2]);
        // escapse all data inside <pre>
        $output = strtr($data, $specialChars);
    }
    if (! empty($output)) {
        return  $arr[1] . $output . $arr[3];
    }   else    {
        return  $arr[1] . $arr[2] . $arr[3];
    }
}
function filterCode($data) { // Uncomment if you want to escape anything within a <pre> tag
    //$modifiedData = preg_replace_callback('@(<pre.*>)(.*)(<\/pre>)@isU', 'escapeHTML', $data);
    $modifiedData = preg_replace_callback('@(<code.*>)(.*)(<\/code>)@isU', 'escapeHTML', $data);
    $modifiedData = preg_replace_callback('@(<tt.*>)(.*)(<\/tt>)@isU', 'escapeHTML', $modifiedData);

    return $modifiedData;
}
add_filter( 'content_save_pre', 'filterCode', 9 );
add_filter( 'excerpt_save_pre', 'filterCode', 9 );
