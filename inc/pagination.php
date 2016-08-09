<?php

// function setrobot_pagination( $mid = 2, $end = 1, $show = false ) {
function setrobot_pagination(array $params)
{
    $param = wp_parse_args(
        $params,
        array(
            'mid'  => '2',
            'end'  => '1',
            'show' => false,
            'prev' => '&laquo; Anterior',
            'next' => 'Próximo &raquo;'
        )
    );

    // Prevent show pagination number if Infinite Scroll of JetPack is active.
    if (!isset($_GET[ 'infinity' ])) {
        global $wp_query, $wp_rewrite;

        $total_pages = $wp_query->max_num_pages;

        if ($total_pages > 1) {
            $current_page = max(1, get_query_var('paged'));
            $url_base     = $wp_rewrite->pagination_base;
            $big          = 999999999;

            if ($wp_rewrite->permalink_structure) {
                $format = '?paged=%#%';
            }
            $format = '/' . $url_base . '/%#%';

            $arguments = apply_filters('setrobot_pagination_args', array(
                    'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format'    => $format,
                    'current'   => $current_page,
                    'total'     => $total_pages,
                    'show_all'  => $param['show'],
                    'end_size'  => $param['end'],
                    'mid_size'  => $param['mid'],
                    'type'      => 'list',
                    'prev_text' => $param['prev'],
                    'next_text' => $param['next'],
                )
            );

            $pagination = '<section class="pagination-wrap">' . paginate_links($arguments) . '</section>';

            if ($url_base) {
                $pagination = str_replace('//' . $url_base . '/', '/' . $url_base . '/', $pagination);
            }

            return $pagination;
        }
    }
}
