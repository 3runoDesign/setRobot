<?php

/**
 * Adding a "Copyright" field to the media uploader $form_fields array
 *
 * @param array $form_fields
 * @param object $post
 *
 * @return array
 */

function add_copyright_field_to_media_uploader($form_fields, $post)
{
    $form_fields['copyright_field'] = array(
        'label' => __('Créditos'),
        'value' => get_post_meta($post->ID, '_custom_copyright', true),
        'helps' => 'Definir os créditos para o autor da imagem.'
    );

    return $form_fields;
}
add_filter('attachment_fields_to_edit', 'add_copyright_field_to_media_uploader', null, 3);

/**
 * Save our new "Copyright" field
 *
 * @param object $post
 * @param object $attachment
 *
 * @return array
 */
function add_copyright_field_to_media_uploader_save($post, $attachment)
{
    if (! empty($attachment['copyright_field'])) {
        update_post_meta($post['ID'], '_custom_copyright', $attachment['copyright_field']);
    } else {
        delete_post_meta($post['ID'], '_custom_copyright');
    }
    return $post;
}
add_filter('attachment_fields_to_save', 'add_copyright_field_to_media_uploader_save', null, 2);

/**
 * Display our new "Copyright" field
 *
 * @param int $attachment_id
 *
 * @return array
 */
function get_featured_image_copyright($attachment_id = null)
{
    $attachment_id = (empty($attachment_id)) ? get_post_thumbnail_id() : (int) $attachment_id;

    if ($attachment_id) {
        return get_post_meta($attachment_id, '_custom_copyright', true);
    }
}
