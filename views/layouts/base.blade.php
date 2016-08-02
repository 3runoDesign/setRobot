<!DOCTYPE html>
<html class="no-js" {{ language_attributes() }}>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php // TODO: Descrição da página ?>
        <?php // TODO: FavIcon ?>

        {{ wp_head() }}
        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">Você está usando um navegador <strong>ultrapassada</strong>. <a href="http://browsehappy.com/">Atualize</a> o seu navegador para melhorar a sua experiência.</p>
        <![endif]-->

        <main>
            @yield('content')
        </main>

        {{ wp_footer() }}
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
