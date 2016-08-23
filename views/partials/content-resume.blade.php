@if( have_posts() )
    @while(have_posts()) {{ the_post() }}

        <section>
            <h2>Últimas 20 notícias</h2>
            <ul>
                <?php wp_get_archives('type=postbypost&limit=20&format=html'); ?>
            </ul>
        </section>

        <section>
            <h2>Categorias</h2>
            <ul>
                <?php wp_list_categories('show_count=1&title_li='); ?>
            </ul>
        </section>

        <section>
            <h2>Meses</h2>
            <ul>
                <?php wp_get_archives('type=monthly&show_post_count=1'); ?>
            </ul>
        </section>

        <section>
            <h2>Anos</h2>
            <ul>
                <?php wp_get_archives('type=yearly&show_post_count=1'); ?>
            </ul>
        </section>

        <section>
            <h2>Tags</h2>
            <?php wp_tag_cloud('smallest=8&largest=16&orderby=name&number=10000'); ?>
        </section>

    @endwhile
@endif
