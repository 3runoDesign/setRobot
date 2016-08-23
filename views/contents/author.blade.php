@if ( have_posts() )
    <header class="page-header">
        <header class="page-header">
            <h1 class="page-title">{{ the_archive_title() }}</h1>
            {{ the_archive_description( '<div class="taxonomy-description">', '</div>' ) }}

        </header>

        @if ( get_the_author_meta( 'description' ) )
            <div class="author-biography">
                <span class="author-avatar">{!! get_avatar( get_the_author_meta( 'ID' ), 60 ) !!}</span>
                <span class="author-description">{{ the_author_meta( 'description' ) }}</span>
            </div>
        @endif
    </header>

    @include('partials.content')

    {{-- <ul>
        @while (have_posts()) {{ the_post() }}
            <li>
                <h1>
                    {{ the_title() }}
                </h1>

                <time class="updated" datetime="{{ get_post_time('c', true) }}">
                    {{ get_the_date() }}
                </time>

                {{ excerpt() }}

            </li>
        @endwhile
    </ul> --}}
@else
    Nenhum post
@endif
