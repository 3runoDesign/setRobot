<section class="meta-post">
    @if( in_array( 'category', get_object_taxonomies( get_post_type() ) ) )
        <span class="cat-links">
            Postado em: {!! get_the_category_list(', ') !!}
        </span>
    @endif

    @if( get_post_type() === 'post' )
        <time class="updated" datetime="{{ get_post_time('c', true) }}">
            {{ get_the_date() }}
        </time>

        @if( !is_author() )
            <span class="author vcard">
                Por <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">{{ get_the_author() }}</a>
            </span>
        @endif

        {{ the_tags( '<span class="tag-links">' . 'Com a(s) tag(s)' . ' ', ', ', '</span>' ) }}

        {{-- TODO: Contar quantos comentarios tem --}}
    @endif

</section>
