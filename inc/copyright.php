<?php

function attachment_field_credit($formFields, $post)
{
    $formFields['setrobot-photographer-name'] = array(
        'label' => 'Créditos da foto',
        'input' => 'text',
        'value' => get_post_meta($post->ID, 'setrobot_copyright_name', true),
        'helps' => 'Se houver crédito da foto.',
    );

    $formFields['setrobot-photographer-url'] = array(
        'label' => 'Site do fotografo',
        'input' => 'text',
        'value' => get_post_meta($post->ID, 'setrobot_copyright_url', true),
        'helps' => 'Site do fotografo',
    );

    return $formFields;
}
add_filter('attachment_fields_to_edit', 'attachment_field_credit', 10, 2);

function attachment_field_credit_save($post, $attachment)
{
    if (isset($attachment['setrobot-photographer-name'])) {
        update_post_meta($post['ID'], 'setrobot_copyright_name', $attachment['setrobot-photographer-name']);
    }

    if (isset($attachment['setrobot-photographer-url'])) {
        update_post_meta($post['ID'], 'setrobot_copyright_url', esc_url($attachment['setrobot-photographer-url']));
    }

    return $post;
}

add_filter('attachment_fields_to_save', 'attachment_field_credit_save', 10, 2);
