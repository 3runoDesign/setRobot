@while ( have_posts() ) {{ the_post() }}
<?php
    $metadata = wp_get_attachment_metadata();
?>
    <article <?php post_class(); ?>>
        <header class="entry-header">
            <h1 class="entry-title">{{ the_title() }}</h1>
        </header>

        <div class="entry-content entry-attachment">
            {!! wp_audio_shortcode( array( 'src' => wp_get_attachment_url() ) ) !!}

            <p>
                <strong>URL: </strong> <a href="{{ esc_url( wp_get_attachment_url() ) }}" title="{{ the_title_attribute() }}" rel="attachment"><span>{{ esc_attr( basename( wp_get_attachment_url() ) ) }}</span></a>
            </p>

            {{ the_content() }}

            @if ( ! empty( $post->post_parent ) )
                <ul class="pager page-title">
                    <li class="previous">
                        <a href="{{ esc_url( get_permalink( $post->post_parent ) ) }}" title="{{ esc_attr( sprintf( 'Voltar para %s', strip_tags( get_the_title( $post->post_parent ) ) ) ) }}">
                            {{ printf( '<span class="meta-nav">&larr;</span> %s', get_the_title( $post->post_parent ) ) }}
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </article>
@endwhile
