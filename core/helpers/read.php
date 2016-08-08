<?php

function excerpt($type = 'excerpt', $limit = 40)
{
    $limit = (int) $limit;
    // Set excerpt type.
    switch ($type) {
        case 'title':
            $excerpt = get_the_title();
            break;
        default :
            $excerpt = get_the_excerpt();
            break;
    }
    return wp_trim_words($excerpt, $limit);
}

function wps_highlight_results($text)
{
    if (is_search()) {
        $sr = get_query_var('s');
        $keys = explode(" ", $sr);
        $text = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">'.$sr.'</strong>', $text);
    }
    return $text;
}
add_filter('the_excerpt', 'wps_highlight_results');
add_filter('the_title', 'wps_highlight_results');


function title()
{
    if (is_home()) {
        if (get_option('page_for_posts', true)) {
            return get_the_title(get_option('page_for_posts', true));
        }
        return 'Últimos posts';
    } elseif (is_archive()) {
        return get_the_archive_title();
    } elseif (is_search()) {
        return sprintf('Resultado da pesquisa para %s', get_search_query());
    } elseif (is_404()) {
        return 'Nada encontrado';
    }
    return get_the_title();
}

function breadcrumb()
{
    $templates = array(
        'before' => '<nav class="setrebot_breadcrumb"><ul>',
        'after' => '</ul></nav>',
        'standard' => '<li>%s</li>',
        'current' => '<li class="setrebot_breadcrumb--current">%s</li>',
        'link' => '<a href="%s"><span>%s</span></a>'
    );
    $options = array(
        'show_htfpt' => true,
        'separator' => '<li class="setrebot_breadcrumb--separator">›</li>'
    );

    new BreadcrumbNavigation($templates, $options, array(), true);
}

function first_paragraph($content)
{
    if (strlen($content) > 0) {
        $content = substr_replace($content, '</span>', 4, 0);
        $content = substr_replace($content, '<span class="first-letter">', 3, 0);
        $content = preg_replace('/<p([^>]+)?>/', '<p$1 class="first-paragraph">', $content, 1);
    }

    return $content;
}
add_filter('the_content', 'first_paragraph');
