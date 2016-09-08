@if(is_page() == 'arquivos')
    @include('partials.content-resume')
@else
    <ul>
        @while (have_posts()) {{ the_post() }}
            <li>
                <a href="{{ get_permalink() }}" alt="{{ get_the_title() }}">
                    <h2>
                        {{ the_title() }}
                    </h2>

                    {{ the_excerpt() }}
                </a>
                @include('partials.metas')

            </li>
        @endwhile
    </ul>

    {!! setrobot_pagination([]) !!}
@endif
