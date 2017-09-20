@extends('layouts.app')

@section('top-style')
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Open Sans', sans-serif;
            font-weight: 700;
            height: 100vh;
            margin: 0;
        }

        .header-top, .footer-main {
            display: none;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
            line-height: 95px
        }

        .title > small {
            font-size: 16px;
            line-height: 16px;
            font-weight: 400;
            display: block;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
             Manutenção

             <small> Retorno </small>
             <small>{{ App\getMaintanceBack('return-date') }}</small>
            </div>

        </div>
    </div>
@endsection
