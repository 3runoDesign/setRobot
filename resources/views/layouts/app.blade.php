<!DOCTYPE html>
<html @php(language_attributes())>

@include('partials.head')

<body @php(body_class('app'))>

    <div class="app__wrapper" role="document">
        <div class="app__container">
            @php(do_action('get_header'))

            <main class="app__main" role="main">
                @yield('content')
            </main>

            @php(do_action('get_footer'))
        </div>
    </div>

    @php(wp_footer())
    @stack('scripts-footer')
</body>
</html>
