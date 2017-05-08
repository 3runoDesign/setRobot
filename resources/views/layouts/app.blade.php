<!DOCTYPE html>
<html @php(language_attributes())>
    @include('partials.head')
    <body @php(body_class())>
        @php(do_action('get_header'))
        @include('partials.header')
        <main class="main">
            @yield('content')
        </main>
        @include('partials.footer')
        @php(do_action('get_footer'))
        @php(wp_footer())
        @include('partials.footer-script')
    </body>
</html>
