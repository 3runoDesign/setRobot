<!DOCTYPE html>
<html @php language_attributes() @endphp>

@include('partials.head')

<body @php body_class('app') @endphp style="background-image: url({{
                                    function_exists('get_field') && get_field('background_login', 'option') ?
                                    get_field('background_login', 'option') :
                                    'https://placeimg.com/1000/1000/any'
                                }});">

    <div id="app" class="app__wrapper" role="document">
        <div class="app__container">@php do_action('get_header') @endphp

            <main class="app__main" role="main">
                <section class="faded-bg"></section>

                <section class="main-container container is-fluid">

                    <div class="columns is-mobile">
                        <div class="column is-hidden-mobile">

                            <div class="logo-title-container">
                                <img class="img-responsive pull-left logo hidden-xs animated fadeIn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAABSCAYAAAAIArdYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ODEzMTNCNzkyQTE0MTFFODg0RTA4NDVCMDVDODdGNjYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6ODEzMTNCN0EyQTE0MTFFODg0RTA4NDVCMDVDODdGNjYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4MTMxM0I3NzJBMTQxMUU4ODRFMDg0NUIwNUM4N0Y2NiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4MTMxM0I3ODJBMTQxMUU4ODRFMDg0NUIwNUM4N0Y2NiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pq6biA0AAATbSURBVHja7FtPSFRBGJ/d9dBBWQ8rEojdYm01HoEoBhVkRBCkGAkdLDylFR2CyA4KHfIWLFh0SayTglJB2MVAD4XSwYXSOosQ3hI9Jtv36Tc0Pd++nZl9zntv8gcf+2femze/+Wa+P/NmEsVikRlGDqQD5DPIiumHJwwTToPMCoRPmyacNPy8e0QWUQOSspkwaveq8HsaZMdmwsMgLfT9K0iehQBThNFQXRB+T4BshkHYlNF6CdJP39FYnQljOJvSMGq31aXdUMia0vAUyLUoaNeEhi+BNAm/82GSNaHhWSLN8QFkEeQLaXvTNsKfhEDDDXRNW9QBS/S5FnfCHRRdNQk+mPl0AAYjj21wSxhCZqkD2gWr3eJB+qRNyYPbXX1z/fcU5L5NyYMf0KA9sC099EoTOY6ZMFpVBudvlogi6j2sN08Xd+KmYWx0JxmmNpAGEEfy3gLIOrkp9NVzQXdAkITRCN0ksk5AdRaINMbfK1EhfBHkjqImdYij5kcpQguFcCPIEPlVh5lBgSKyUW0Dh4Q1pB9kuRgelqkNym1X1TBa2Wc0X01p1U/bOK9vqyQhKoRxCL8GOcuihQWQPtkhLks4qmSVScsQjjpZJdLlCMeFrDRpP8IYMb0FuczihfcgXaUiNL9saSyGZBm1eUw1PeyhgCKuaCcOUkMah/LHGM1bv/l83j20vTQ8ZAFZRhyGyg3pdKmhEFP0CDm4J+G7EQgZg4RDnDwJpyzTrqjllBfhLsu0K2q5y4twN7MX3W7CaUr5bEWOG6+k4Kgdiwk7PJDihFuZ/WgVCWcrqAhfeF8HqQM5Iggu6o1QuUpdI3SvWFcdPWOqgnbucaS1Ht31qTxIpsw6kgMyKVHXJF3rV1eGnqm7DrZLOKVJGBtYLbl4Vo60DFku1ZId6EU4lSRV6xis5yDbktfigtuqT/kqXSODbXq2juHKYo/lNLWbUFwizfjUl1GsK6Gp5Zzu69INnP6K9/wqYXSmqEwFRWqDMnQJL2rc81uzLMg2aBOujYBfrTVJWGeBoBqk1+P/Xioz0QZtwtjIjOI9pzTLvJAp0XkHRhgxqHBtVZnrB5naboRB7VZruiWOAQkXUiUZHeXp2nL1DVTQ3lylhBHDPn70uGIomKd7Svnx4Qrbmkvsst6/X0ongdhwuYoruvOM6nsn/MbUrr6C+jiagyIcFzQn2X+GQ8KHhA8JHxKOFTCcw234C+zvSyfblmv5Sgpubdpyvx/mi/Ft9NlEmUwN+3eh3okYGcQKKQ+XgL7Tf0tC2S50th6maRmVuTqHA8uOBkToJ9vbYyliSfi+zhRPxoR5BCAUIOED35QdNcL42U9D4wfNgzVL+DWS/eG78cd50o3vXW55GIJFj7m0Sp3CQuocToLR5wkP29HuYWBfIGGuYXxLPl2hlXRbyyDg9g6VeAk8nT7DCaO655m9r0xRMedw2iYFpzxnsa2a4+5LDC0nmPz7nbhpd8Irlsa5N2Mh4Rm/SMuWbYcc+7YfurMlLOizZGgXiEvZvZboVx/GnHSBOOyPEXwWvDtA5ovxwzy1XesYD0Y1T1g0ju3IaBWN0yOmeQRARD/NhyifasGzGeNBpodowW+wvW18DSwaB7Uwvn8D8ko249PNh3GodworIqaOCywKKxpzOonLHwEGALSMJyXl2nY9AAAAAElFTkSuQmCC" alt="Logo Icon">
                                <div class="copy animated fadeIn">
                                    <h1>{{ bloginfo('name') }}</h1>
                                    <p>{{ __('Created by setRobot.', 'setrobot') }}</p>
                                </div>
                            </div>

                        </div>

                        <div class="column is-half-tablet is-two-fifths-desktop login-sidebar">
                            @yield('content')
                        </div>
                    </div>
                </section>

            </main>
            @php do_action('get_footer') @endphp

        </div>
    </div>

    <div class="notification-area">
        @yield('notification')
    </div>

    @php wp_footer() @endphp
    @include('partials.foot')

    <script>
        (function($){
            var login_form = '.login-container form';
            var input_form = $(login_form + ' input[type="text"], '+ login_form + ' input[type="password"]');

            $(input_form[0]).focus();
            $(input_form[0]).parent().addClass('focused');

            input_form.each(function(e) {
                $(this).on('focusin', function(e) {
                    $(this.form).find('.focused').removeClass('focused');
                    $(this).parent('p').addClass('focused');
                })
            });

            @isset($_GET['logout'])
                @if ($_GET['logout'] == 'success')
                    setTimeout("location.href = '{{ get_bloginfo("url") }}';", 6000);
                @endif
            @endisset
        })(jQuery);
    </script>

    @stack('scripts-footer')


</body>
</html>
