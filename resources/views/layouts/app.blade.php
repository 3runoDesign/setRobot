<!DOCTYPE html>
<html @php language_attributes() @endphp>

@include('partials.head')

<body @php body_class('app') @endphp>

    <div id="app" class="app__wrapper" role="document">
        <div class="app__container">@php do_action('get_header') @endphp

            <main class="app__main" role="main">
                @if (has_nav_menu('primary_navigation'))
                    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
                @endif

                @yield('content')
            </main>
            @php do_action('get_footer') @endphp

        </div>
    </div>

    <div class="notification-area">
        @yield('notification')
    </div>

    @php wp_footer() @endphp
    @include('partials.foot')
    @stack('scripts-footer')
</body>
</html>
