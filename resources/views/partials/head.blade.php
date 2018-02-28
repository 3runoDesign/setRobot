<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ \App\config('theme.uri') }}/resources/favicon.ico" type="image/x-icon">
    <link rel="icon" href="{{ \App\config('theme.uri') }}/resources/favicon.ico" type="image/x-icon">

    @php(wp_head())

    @stack('styles-head')
    @stack('scripts-head')
</head>
