<?php global $post; ?>

@while ( have_posts() ) {{ the_post() }}
    <article <?php post_class(); ?>>

        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>

        <section class="entry-content entry-attachment">

            {!! wp_video_shortcode( array( 'src' => wp_get_attachment_url() ) ) !!}

            <p>
                <strong>URL: <a href="{{ wp_get_attachment_url() }}" title="{{ the_title_attribute() }}" rel="attachment"><span>{{ basename( wp_get_attachment_url() ) }}</span></a>
            </p>

            <?php if ( ! empty( $post->post_parent ) ) : ?>
                <ul class="pager page-title">
                    <li class="previous">
                        <a href="{{ esc_url( get_permalink( $post->post_parent ) ) }}" title="{{ esc_attr( sprintf( 'Voltar para %s', strip_tags( get_the_title( $post->post_parent ) ) ) ) }}">
                            {{ printf( '<span class="meta-nav">&larr;</span> %s', get_the_title( $post->post_parent ) ) }}
                        </a>
                    </li>
                </ul>
            <?php endif; ?>

        </section>

    </article>
@endwhile
