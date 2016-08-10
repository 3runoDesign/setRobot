<!DOCTYPE html>
<html class="no-js" {{ language_attributes() }}>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php // TODO: Descrição da página ?>
        <?php // TODO: FavIcon ?>

        <title>{{ wp_title('|', true, 'right') }}</title>

        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

        <style media="screen">
        .ui-autocomplete { position: absolute; cursor: default; background:#CCC }

/* workarounds */
html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */
.ui-menu {
list-style:none;
padding: 2px;
margin: 0;
display:block;
float: left;
}
.ui-menu .ui-menu {
margin-top: -3px;
}
.ui-menu .ui-menu-item {
margin:0;
padding: 0;
zoom: 1;
float: left;
clear: left;
width: 100%;
}
.ui-menu .ui-menu-item a {
text-decoration:none;
display:block;
padding:.2em .4em;
line-height:1.5;
zoom:1;
}
.ui-menu .ui-menu-item a.ui-state-hover,
.ui-menu .ui-menu-item a.ui-state-active {
font-weight: normal;
margin: -1px;
}
        </style>


        {{ wp_head() }}
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">Você está usando um navegador <strong>ultrapassada</strong>. <a href="http://browsehappy.com/">Atualize</a> o seu navegador para melhorar a sua experiência.</p>
        <![endif]-->

        <main>
            @yield('content')
        </main>

        {{ wp_footer() }}

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.14.2/lodash.min.js"></script>

        @yield('script') {{-- Inserir script por page --}}

        {{--
            TODO: Criar um metodo para criar esse script.
            Google Analytics: change UA-XXXXX-X to be your site's ID.
        --}}
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
