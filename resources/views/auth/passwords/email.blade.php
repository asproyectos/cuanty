<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <base href="../../../">
    <meta charset="utf-8" />
    <title>Ingreso - Monitoreo de Aves | CVC</title>
    <meta name="description" content="Ingreso - Monitoreo de Aves | CVC">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('css/pages/login/login-3.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('css/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{ asset('media/bg/bg-login.jpg') }});">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper" style=" border-radius: 30px; box-shadow: 0 0 15px 5px rgba(0,0,0,.15); padding-top: 20px; margin-top: 50px; ">
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <a href="#">
                                <img src="{{ asset('media/logos/logo-cvc-login@2x.png') }}" style=" width: 250px; ">
                            </a>
                        </div>
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">¿Olvidó la contraseña?</h3>
                                <div class="kt-login__desc">Ingresa tu email para restablecer la contraseña:</div>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            <form class="kt-form" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="input-group">
                                    {{-- <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off"> --}}
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                </div>
                                @error('email')
                                    <span>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="kt-login__actions">
                                    <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Solicitar</button>&nbsp;&nbsp;
                                    {{-- <button id="kt_login_forgot_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Cancelar</button> --}}
                                </div>
                            </form>
                        </div>
                        <div class="kt-login__account">
                            <a href="{{ route('login') }}">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
    </script>

    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('js/pages/custom/login/login-general.js') }}" type="text/javascript"></script>

    <!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
