<div>
    <form id="domain-searchform" action="{{esc_url(home_url('/'))}}">
        <input type="search" name="s" value="<?php echo get_search_query(); ?>">
        <input type="submit">
    </form>
</div>
<div>
    <h2>Resultados Busca</h2>
    <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post() ?>
            <a href=" <?php the_permalink(); ?> "> <h2><?php  the_title(); ?></h2></a>
            <p><?php the_excerpt(); ?></p>
            <hr>
    <?php
        endwhile;
            if( function_exists('wp_pagenavi') ) {
                wp_pagenavi();
            }
    ?>
    <?php else : ?>
        @include('contents/404')
    <?php endif; ?>
</div>
