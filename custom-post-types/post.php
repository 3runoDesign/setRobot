<?php

$news = new CPT('post');

$news->register_taxonomy(array(
    'taxonomy_name' => 'secao',
    'slug'          => 'secao',
    'singular'      => 'Seção',
    'plural'        => 'Seções',
));


$news_tax_secao = new SetRobot_Taxonomy_Single_Term('secao', array($news->post_type_name), 'select');
$news_tax_secao->set('metabox_title', 'Escolha a seção da notícia');
$news_tax_secao->set('priority', 'high');
$news_tax_secao->set( 'allow_new_terms', true );

$args = array(
    "applied_label" => "Arquivado",
    "label" => "Arquivo"
);


new CustomPostStatus('archive', array($news->post_type_name), $args);
