<section id="primary">
    <div id="content" class="site-content" role="main">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">{{ the_archive_title() }}</h1>
                {{ the_archive_description( '<div class="taxonomy-description">', '</div>' ) }}

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

                        <p class="byline author vcard">
                            Por <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">{{ get_the_author() }}</a>
                        </p>

                        {{ excerpt() }}

                    </li>
                @endwhile
            </ul> --}}

            {!! setrobot_pagination([]) !!}
        <?php endif; ?>
    </div>
</section>
