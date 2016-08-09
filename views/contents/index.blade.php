{{get_search_form()}}
@wpposts

    {{ the_title() }}
    @if (has_post_thumbnail())
        {{ the_post_thumbnail('setrobot_thumbnail-loading') }}
        <a href="{{ copyrightData('url') }}"><h1>{{ copyrightData() }}</h1></a>
    @endif
@wpempty
    No posts found
@wpend
