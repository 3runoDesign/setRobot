<nav class="nav-main-menu">
    <section class="container">

        <section class="brand col-xs-6 col-sm-3 col-md-2">
            <a href="{{ bloginfo('url') }}" class="logo">
                <img src="https://dummyimage.com/145x60/4a3580/fff.png" alt="Logo">
            </a>
        </section>

        {{-- Menu Responsive --}}
        <input class="burger-check" id="burger-check" type="checkbox">
        <label for="burger-check" class="burger"></label>

        <section class="nav-wrap col-xs-12 col-sm-12 col-md-10">
            {{ App\get_menu('primary_navigation') }}
        </section>
    </section>
</nav>
