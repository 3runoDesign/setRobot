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

function highlight_terms($phrase, $string) {
    $non_letter_chars = '/[^\pL]/iu';
    $words = preg_split($non_letter_chars, $phrase);

    $search_words = array();

    foreach ($words as $word) {
        if (strlen(remove_accents($word)) >= 2 && !preg_match($non_letter_chars, $word)) {
            $search_words[] = $word;
        }
    }

    $search_words = array_unique($search_words);


    foreach ($search_words as $word) {
        $search = preg_quote($word);

        /* repeat for each possible accented character */
        $search = preg_replace('/(ae|æ|ǽ)/iu', '(ae|æ|ǽ)', $search);
        $search = preg_replace('/(oe|œ)/iu', '(oe|œ)', $search);
        $search = preg_replace('/[aàáâãäåǻāăą](?!e)/iu', '[aàáâãäåǻāăą]', $search);
        $search = preg_replace('/[cçćĉċč]/iu', '[cçćĉċč]', $search);
        $search = preg_replace('/[dďđ]/iu', '[dďđ]', $search);
        $search = preg_replace('/(?<![ao])[eèéêëēĕėęě&]/iu', '[eèéêëēĕėęě&]', $search);
        $search = preg_replace('/[gĝğġģ]/iu', '[gĝğġģ]', $search);
        $search = preg_replace('/[hĥħ]/iu', '[hĥħ]', $search);
        $search = preg_replace('/[iìíîïĩīĭįı]/iu', '[iìíîïĩīĭįı]', $search);
        $search = preg_replace('/[jĵ]/iu', '[jĵ]', $search);
        $search = preg_replace('/[kķĸ]/iu', '[kķĸ]', $search);
        $search = preg_replace('/[lĺļľŀł]/iu', '[lĺļľŀł]', $search);
        $search = preg_replace('/[nñńņňŉŋ]/iu', '[nñńņňŉŋ]', $search);
        $search = preg_replace('/[oòóôõöōŏőǿơ](?!e)/iu', '[oòóôõöōŏőǿơ]', $search);
        $search = preg_replace('/[rŕŗř]/iu', '[rŕŗř]', $search);
        $search = preg_replace('/[sśŝşš]/iu', '[sśŝşš]', $search);
        $search = preg_replace('/[tţťŧ]/iu', '[tţťŧ]', $search);
        $search = preg_replace('/[uùúûüũūŭůűųǔǖǘǚǜ]/iu','[uùúûüũūŭůűųǔǖǘǚǜ]', $search);
        $search = preg_replace('/[wŵ]/iu', '[wŵ]', $search);
        $search = preg_replace('/[yýÿŷ]/iu', '[yýÿŷ]', $search);
        $search = preg_replace('/[zźżž]/iu', '[zźżž]', $search);

        $string = preg_replace('/\b' . $search . '/iu', '<span class="keysearch">$0</span>', $string);
    }

    return $string;

}



function results_highlight_search($text)
{
    if(is_search()){
        $text = highlight_terms(get_query_var('s'), $text);
    }

    return $text;

}
add_filter('the_excerpt', 'results_highlight_search');
add_filter('the_title', 'results_highlight_search');


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

/*
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
*/
