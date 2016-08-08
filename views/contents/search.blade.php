<section>

    @if (have_posts())
        {{ get_search_form() }}
        <header class="page-header">
            <h1 class="page-title">
                <?php printf( 'Resultado para a busca: %s', get_search_query() ); ?>
            </h1>
        </header>

        <ul>
        @while (have_posts()) {{ the_post() }}

            <li>
                <h1>
                    {{ the_title() }}
                </h1>
                @if (get_post_type() === 'post')
                    <time class="updated" datetime="{{ get_post_time('c', true) }}">
                        {{ get_the_date() }}
                    </time>
                    <p class="byline author vcard">
                        Por <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">{{ get_the_author() }}</a>
                    </p>

                    {{ the_excerpt() }}
                @endif

            </li>
        @endwhile
        </ul>

        {!! setrobot_pagination([]) !!}

    @else
        <h1>Nada encontrado!</h1>
    @endif

</section>
