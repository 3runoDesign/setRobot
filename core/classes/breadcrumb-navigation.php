<?php

class BreadcrumbNavigation {

    private $breadcrumb;
    private $templates;
    private $strings;
    private $options;

    public function __construct( array $templates, array $options, array $strings, $autorun ) {
        $this->templates = wp_parse_args(
            $templates,
            array(
                'link' => '<a href="%s">%s</a>',
                'current' => '<span class="c">%s</span>',
                'standard' => '<span class="s">%s</span>',
                'before' => '<nav>',
                'after' => '</nav>'
            )
        );
        $this->options = wp_parse_args( $options, array(
            'separator' => ' › ',
            'posts_on_front' => 'posts' == get_option( 'show_on_front' ) ? true : false,
            'page_for_posts' => get_option( 'page_for_posts' ),
            'show_pagenum' => true, // support pagination
            'show_htfpt' => false // show hierarchical terms for post types
        ) );
        $this->strings = wp_parse_args( $strings, array(
            'home' => 'Home',
            'search' => array(
                'singular' => 'Um resultado da pesquisa para<em>%s</em>',
                'plural'   => '%s Resultados da pesquisa sobre <em>%s</em>'
            ),
            'paged' => 'Página %d',
            '404_error' => 'Erro: página não existe'
        ) );
        // Generate breadcrumb
        if ( $autorun)
            echo $this->output();
    }
    /**
     * Return the final breadcrumb.
     *
     * @return string
     */
    public function output() {
        if ( empty( $this->breadcrumb ) )
            $this->generate();
        $breadcrumb = (string) implode( $this->options['separator'], $this->breadcrumb );
        return $this->templates['before'] . $breadcrumb . $this->templates['after'];
    }
    /**
     * Build the item based on the type.
     *
     * @param string|array $item
     * @param string $type
     * @return string
     */
    protected function template( $item, $type = 'standard' ) {
        if ( is_array( $item ) )
            $type = 'link';
        switch ( $type ) {
            case'link':
                return $this->template(
                    sprintf(
                        $this->templates['link'],
                        esc_url( $item['link'] ),
                        $item['title']
                    )
                );
                break;
            case 'current':
                return sprintf( $this->templates['current'], $item );
                break;
            case 'standard':
                return sprintf( $this->templates['standard'], $item );
                break;
        }
    }
    /**
     * Helper to generate taxonomy parents.
     *
     * @param mixed $termId
     * @param mixed $taxonomy
     * @return void
     */
    protected function generateTaxParents( $termId, $taxonomy ) {
        $parentIds = array_reverse( get_ancestors( $termId, $taxonomy ) );
        foreach ( $parentIds as $parentId ) {
            $term = get_term( $parentId, $taxonomy );
            $this->breadcrumb["archive_{$taxonomy}_{$parentId}"] = $this->template( array(
                'link' => get_term_link( $term->slug, $taxonomy ),
                'title' => $term->name
            ) );
        }
    }
    /**
     * Generate the breadcrumb.
     *
     * @return void
     */
    public function generate() {

        $postType = get_post_type();
        $queriedObject = get_queried_object();
        $this->options['show_pagenum'] = ( $this->options['show_pagenum'] && is_paged() ) ? true : false;

        // Home & Front Page
        $this->breadcrumb['home'] = $this->template( $this->strings['home'], 'current' );
        $homeLinked = $this->template( array(
            'link' => home_url( '/' ),
            'title' => $this->strings['home']
        ) );
        if ( $this->options['posts_on_front'] ) {
            if ( ! is_home() || $this->options['show_pagenum'] )
                $this->breadcrumb['home'] = $homeLinked;
        } elseif ( !$this->options['posts_on_front'] ) {
            if ( ! is_front_page() )
                $this->breadcrumb['home'] = $homeLinked;
            if ( is_home() && !$this->options['show_pagenum'] )
                $this->breadcrumb['blog'] = $this->template( get_the_title( $this->options['page_for_posts'] ), 'current' );
            if ( ( 'post' == $postType && ! is_search() && ! is_home() ) || ( 'post' == $postType && $this->options['show_pagenum'] ) )
                $this->breadcrumb['blog'] = $this->template( array(
                    'link' => get_permalink( $this->options['page_for_posts'] ),
                    'title' => get_the_title( $this->options['page_for_posts'] )
                ) );
        }
        // Post Type Archive as index
        if ( is_singular() || ( is_archive() && ! is_post_type_archive() ) || is_search() || $this->options['show_pagenum'] ) {
            if ( $postTypeLink = get_post_type_archive_link( $postType ) ) {
                $postTypeLabel = get_post_type_object( $postType )->labels->name;
                $this->breadcrumb["archive_{$postType}"] = $this->template(
                    array(
                    'link' => $postTypeLink,
                    'title' => $postTypeLabel
                ) );
            }
        }
        if ( is_singular() ) { // Posts, (Sub)Pages, Attachments and Custom Post Types
            if ( ! is_front_page() ) {
                if ( $this->options['show_htfpt'] ) {
                    $_id = $queriedObject->ID;
                    $_post_type = $postType;
                    if ( is_attachment() ) {
                        // Show terms of the parent page
                        $_id = $queriedObject->post_parent;
                        $_post_type = get_post_type( $_id );
                    }
                    $taxonomies = get_object_taxonomies( $_post_type, 'objects' );
                    $taxonomies = array_values( wp_list_filter( $taxonomies, array(
                        'hierarchical' => true
                    ) ) );
                    if ( ! empty( $taxonomies ) ) {
                        $taxonomy = $taxonomies[0]->name; // Get the first taxonomy
                        $terms = get_the_terms( $_id, $taxonomy );
                        if ( ! empty( $terms ) ) {
                            $terms = array_values( $terms );
                            $term = $terms[0]; // Get the first term
                            if ( 0 != $term->parent )
                                $this->generateTaxParents( $term->term_id, $taxonomy );
                            $this->breadcrumb["archive_{$taxonomy}"] = $this->template( array(
                                'link' => get_term_link( $term->slug, $taxonomy ),
                                'title' => $term->name
                            ) );
                        }
                    }
                }
                if ( 0 != $queriedObject->post_parent ) { // Get Parents
                    $parents = array_reverse( get_post_ancestors( $queriedObject->ID ) );
                    foreach ( $parents as $parent ) {
                        $this->breadcrumb["archive_{$postType}_{$parent}"] = $this->template( array(
                            'link' => get_permalink( $parent ),
                            'title' => get_the_title( $parent )
                        ) );
                    }
                }
                $this->breadcrumb["single_{$postType}"] = $this->template( get_the_title(), 'current' );
            }
        } elseif ( is_search() ) { // Search
            $total = $GLOBALS['wp_query']->found_posts;
            $text = sprintf(
                _n(
                    $this->strings['search']['singular'],
                    $this->strings['search']['plural'],
                    $total
                ),
                $total,
                get_search_query()
            );
            $this->breadcrumb['search'] = $this->template( $text, 'current' );
            if ( $this->options['show_pagenum'] )
                $this->breadcrumb['search'] = $this->template( array(
                    'link' => home_url( '?s=' . urlencode( get_search_query( false ) ) ),
                    'title' => $text
                ) );
        } elseif ( is_archive() ) { // All archive pages
            if ( is_category() || is_tag() || is_tax() ) { // Categories, Tags and Custom Taxonomies
                $taxonomy = $queriedObject->taxonomy;
                if ( 0 != $queriedObject->parent && is_taxonomy_hierarchical( $taxonomy ) ) // Get Parents
                    $this->generateTaxParents( $queriedObject->term_id, $taxonomy );
                $this->breadcrumb["archive_{$taxonomy}"] = $this->template( $queriedObject->name, 'current' );
                if ( $this->options['show_pagenum'] )
                    $this->breadcrumb["archive_{$taxonomy}"] = $this->template( array(
                        'link' => get_term_link( $queriedObject->slug, $taxonomy ),
                        'title' => $queriedObject->name
                    ) );
            } elseif ( is_date() ) { // Date archive
                if ( is_year() ) { // Year archive
                    $this->breadcrumb['archive_year'] = $this->template( get_the_date( 'Y' ), 'current' );
                    if ( $this->options['show_pagenum'] )
                        $this->breadcrumb['archive_year'] = $this->template( array(
                            'link' => get_year_link( get_query_var( 'year' ) ),
                            'title' => get_the_date( 'Y' )
                        ) );
                } elseif ( is_month() ) { // Month archive
                    $this->breadcrumb['archive_year'] = $this->template( array(
                        'link' => get_year_link( get_query_var( 'year' ) ),
                        'title' => get_the_date( 'Y' )
                    ) );
                    $this->breadcrumb['archive_month'] = $this->template( get_the_date( 'F' ), 'current' );
                    if ( $this->options['show_pagenum'] )
                        $this->breadcrumb['archive_month'] = $this->template( array(
                            'link' => get_month_link( get_query_var( 'year' ), get_query_var( 'monthnum' ) ),
                            'title' => get_the_date( 'F' )
                        ) );
                } elseif ( is_day() ) { // Day archive
                    $this->breadcrumb['archive_year'] = $this->template( array(
                        'link' => get_year_link( get_query_var( 'year' ) ),
                        'title' => get_the_date( 'Y' )
                    ) );
                    $this->breadcrumb['archive_month'] = $this->template( array(
                        'link' => get_month_link( get_query_var( 'year' ), get_query_var( 'monthnum' ) ),
                        'title' => get_the_date( 'F' )
                    ) );
                    $this->breadcrumb['archive_day'] = $this->template( get_the_date( 'j' ) );
                    if ( $this->options['show_pagenum'] )
                        $this->breadcrumb['archive_day'] = $this->template( array(
                            'link' => get_month_link(
                                get_query_var( 'year' ),
                                get_query_var( 'monthnum' ),
                                get_query_var( 'day' )
                            ),
                            'title' => get_the_date( 'F' )
                        ) );
                }
            } elseif ( is_post_type_archive() && ! is_paged() ) { // Custom Post Type Archive
                $postTypeLabel = get_post_type_object( $postType )->labels->name;
                $this->breadcrumb["archive_{$postType}"] = $this->template( $postTypeLabel, 'current' );
            } elseif ( is_author() ) { // Author archive
                $this->breadcrumb['archive_author'] = $this->template( $queriedObject->display_name, 'current' );
            }
        } elseif ( is_404() ) {
            $this->breadcrumb['404'] = $this->template( $this->strings['404_error'], 'current' );
        }
        if ( $this->options['show_pagenum'] )
            $this->breadcrumb['paged'] = $this->template(
                sprintf(
                    $this->strings['paged'],
                    get_query_var( 'paged' )
                ),
                'current'
            );
    }
}
