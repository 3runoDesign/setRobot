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

            <?php
                $title = get_the_title();
                $keys= explode(" ", get_search_query());

                $title = preg_replace(
                    '/('.implode('|', $keys) .')/iu',
                    '<strong class="search-excerpt">\0</strong>',
                    $title
                );
            ?>

            <li><h1>{!! $title !!}</h1></li>
        @endwhile
        </ul>

        {!! setrobot_pagination([]) !!}

    @else
        <h1>Nada encontrado!</h1>
    @endif

</section>
