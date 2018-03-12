<?php

namespace App\Fields;

use StoutLogic\AcfBuilder\FieldsBuilder;

/*
 * Create options page
 * https://www.advancedcustomfields.com/resources/options-page/
 */

//if( function_exists('acf_add_options_page') ) {
//
//    acf_add_options_page();
//
//}

$options_field = new FieldsBuilder('sample_field', [
    'style' => 'seamless',
    'position' => 'acf_after_title',
    'hide_on_screen' => ['the_content'],
]);

/** Fields setup */
$options_field
    ->addText('title')
    ->addWysiwyg('content');

/** Field Group location setup */
$options_field
    ->setLocation('options_page', '==', 'acf-options');

//return $options_field;
