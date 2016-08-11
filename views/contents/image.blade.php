@while (have_posts()) {{ the_post() }}
    <article {{ post_class() }}>
        <header class="entry-header">
            <h1 class="entry-title">
                {{ the_title() }}
            </h1>
            <section class="entry-meta entry-content">
                <?php
                $metadata = wp_get_attachment_metadata();
                printf( 'Tamanho total da imagem: %s pixels', sprintf( '<a href="%1$s" title="%2$s"><span>%3$s</span> &times; <span>%4$s</span></a>', wp_get_attachment_url(), esc_attr( 'Link para imagem normal' ), $metadata['width'], $metadata['height'] ) );
                ?>
            </section>
        </header>

        <section class="entry-content entry-attachment">
            <p class="attachment">
                <a href="{{ wp_get_attachment_url( $GLOBALS['post']->ID, 'full' ) }}" title="{{ the_title_attribute() }}">
                    {!! wp_get_attachment_image( $GLOBALS['post']->ID, 'full' ) !!}
                </a>
            </p>
            <div class="entry-caption">
                <em>
                    @if ( ! empty( $GLOBALS['post']->post_excerpt ) )
                        {{ the_excerpt() }}
                    @endif
                </em>
            </div>
            {{ the_content() }}

            <ul class="pager">
                <li class="previous">
                    <?php previous_image_link( false, '&larr; Anterior imagem' ); ?>
                </li>
                <li class="next">
                    <?php next_image_link( false, 'Próxima imagem &rarr;' ); ?>
                </li>
            </ul><!-- .pager -->

            @if (! empty( $GLOBALS['post']->post_parent ))
                <ul class="pager page-title">
                    <li class="previous">
                        <a href="{{ esc_url( get_permalink( $GLOBALS['post']->post_parent ) ) }}" title="{{ esc_attr( sprintf( 'Voltar para %s', strip_tags( get_the_title( $GLOBALS['post']->post_parent ) ) ) ) }}" rel="gallery">
                            <?php
                                printf(
                                    '<span class="meta-nav">&larr;</span> %s',
                                    get_the_title( $GLOBALS['post']->post_parent )
                                );
                            ?>
                        </a>
                    </li>
                </ul>
            @endif

        </section>
    </article>
@endwhile
