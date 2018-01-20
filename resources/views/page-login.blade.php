{{--
  Template Name: Login
--}}

@extends('layouts.blank')

@isset($_GET['login'])
    @if ($_GET['login'] == 'empty' || $_GET['login'] == 'failed')
        <style media="screen">
            #loginform {
                color: #f31032;
            }

            #loginform input {
                border-color: #f31032 !important;
            }
        </style>
    @endif
@endisset

@push('top-style')
@endpush

@section('content')

    @if ( !is_user_logged_in())

        <div class="container-login container-fluid">
            <div class="row middle-xs">

                @isset($_GET['logout'])
                    @if ($_GET['logout'] == 'success')
                        <p class="notification-flag">
                            Logout feito com sucesso!
                        </p>
                    @endif
                @endisset

                <div class="side-background col-xs-12 col-sm-6 col-md-6">
                    <div class="background-image-holder">
                        <img alt="image"
                             src="https://images.pexels.com/photos/630839/pexels-photo-630839.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb"/>
                    </div>
                </div>

                <div class="col-form col-xs-12 col-sm-6 col-md-5 ">
                    <h2 class="login-title">Login</h2>

                    @isset($_GET['logout'])
                        @if ($_GET['logout'] == 'success')
                            <p class="lead">
                                Logout feito com sucesso!<br>
                                Volter sempre!
                            </p>
                        @endif
                        @else
                            <p class="lead">
                                Bem-vindo novamente, faça login com suas credenciais de conta
                                <strong>{{ bloginfo('name') }}</strong> existentes.
                            </p>
                            @endisset
                            {{
                                wp_login_form( array(
                                    'redirect'       => home_url(),
                                    'id_username'    => 'user',
                                    'id_password'    => 'pass',
                                    'remember'       => false,
                                    'label_username' => 'Usuário:',
                                    'label_password' => 'Senha:',
                                    'label_log_in'   => 'Entrar'
                                ))
                            }}
                </div>
            </div>
        </div>


        @isset($_GET['login'])
            @if ($_GET['login'] == 'empty')
                <div class="notification-login col-sm-4 col-md-3">
                    <div class="boxed">
                        <img alt="avatar" class="img-avatar-login image--sm img-circle"
                             src="https://randomuser.me/api/portraits/men/11.jpg">
                        <div class="text-block">
                            <h5>
                                Oops!
                            </h5>
                            <p>
                                Você deixou algum campo em branco. Por favor, entre com sua credencial!
                            </p>
                        </div>
                    </div>
                    <div class="notification-close-cross notification-close">
                    </div>
                </div>
            @elseif ($_GET['login'] == 'failed')
                <div class="notification-login col-sm-4 col-md-3">
                    <div class="boxed">
                        <img alt="avatar" class="img-avatar-login image--sm img-circle"
                             src="https://randomuser.me/api/portraits/men/11.jpg">
                        <div class="text-block">
                            <h5>
                                Oops!
                            </h5>
                            <p>
                                Você errou algum dos campos. Por favor, entre com sua credencial! Agora se você esqueceu
                                ela, <a href="{{ wp_lostpassword_url( get_permalink() ) }}" title="Lost Password">acesse
                                    aqui</a> para recupera-la!
                            </p>
                        </div>
                    </div>
                    <div class="notification-close-cross notification-close">
                    </div>
                </div>
            @endif
        @endisset

    @else
        @php
            wp_redirect(home_url());
            exit();
        @endphp
    @endif

@endsection

@push('footer-script')
    <script type="text/javascript">
        (function ($) {
            $('.background-image-holder').each(function () {
                var imgSrc = $(this).children('img').attr('src');
                $(this).css('background', 'url("' + imgSrc + '")')
                    .css('background-position', 'initial')
                    .css('opacity', '1');
            });

            // Notification login
            $('.notification-close-cross').on('click', function (e) {
                e.preventDefault();
                $(this).parent('.notification-login').addClass('notification--close');
            });
        })(jQuery);
    </script>
@endpush
