<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="@getimage('favicon.ico')" type="image/x-icon">
    <link rel="icon" href="@getimage('favicon.ico')" type="image/x-icon">

    @php wp_head() @endphp

    @if(is_admin_bar_showing())
        <style>
            html { margin-top: 32px !important; }
            * html body { margin-top: 32px !important; }
        </style>
    @endif

    @stack('styles-head')
    @stack('scripts-head')
</head>
