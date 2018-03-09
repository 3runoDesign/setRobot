<!DOCTYPE html>
<html @php(language_attributes())>

@include('partials.head')

<body @php(body_class('app'))>

    <div class="app__wrapper" role="document">
        <div class="app__container">
            @php(do_action('get_header'))

            <main class="app__main" role="main">
                @if (has_nav_menu('primary_navigation'))
                    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
                @endif

                @yield('content')
            </main>

            @php(do_action('get_footer'))
        </div>
    </div>

    @php(wp_footer())
    @stack('scripts-footer')
</body>
</html>
