<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->
<head>
    <base href="../../../">
    <meta charset="utf-8" />
    <title>Ingreso - Termovalle - Rondas de operaciones</title>
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
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.png') }}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body style="background:white;" class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
                <div class="row" style="height:100%;">
                        <div class="col-md-6" style="height:100%;">
                            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                                <div class="kt-login__container" style="width:700px;">
                                    <div class="kt-login__logo" style="margin-bottom: 2px; margin-top: 50px;">
                                        <a href="#">
                                            <img src="{{ asset('media/logos/logo-mas-login@2x.png') }}" style=" width: 250px; ">
                                        </a>
                                    </div>
                                    <div class="kt-login__signin">
                                        <div class="kt-login__head" style="padding-top: 90px;">
                                            <h3 class="kt-login__title" style="font-size:56px;"><span style="color:#824305;">RONDA DE </span><span style="color:#ef9f0b">OPERACIONES</span></h3>
                                            <h4 class="kt-login__title">SOFTWARE PROFESIONAL PARA INSPECCIÓN DE EQUIPOS</h4>
                                        </div>
                                        <form class="kt-form" style="width: 350px;" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="identificacion" placeholder="Identificación" name="identificacion" autocomplete="off">
                                            </div>
                                            <div class="input-group">
                                                <input class="form-control" id="password" type="password" placeholder="Contraseña" name="password">
                                            </div>
                                            <div class="row kt-login__extra">
                                                <div class="col">
                                                    <label class="kt-checkbox">
                                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="kt-login__actions">
                                                <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary" style="background-color:#ef9f0c; border-color:#ef9f0c;color:white;">Iniciar Sesión</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="kt-login__account">
                                        <span class="kt-login__account-msg">
                                            ¿Ha olvidado su contraseña?
                                        </span>
                                        <a style="color:#ef9f0b; font-weight: 600;" href="{{ route('password.request') }}">Recordar</a>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="background-repeat: no-repeat; background-position-y: initial; background-size: cover; bottom;background-image: url({{ asset('media/bg/bg-login.jpg') }});">
                            <div style="position: absolute; top: 40%;">
                                <h1 style="font-size: 45px; color: white; text-align:center;">BIENVENIDOS AL SISTEMA DE INSPECCIÓN</h1>
                                <h3 style="padding-top: 30px; font-size: 30px;color: white; text-align:center;">Aumente la productividad de las inspecciones, más precisión de los datos, y mejore la planificación del mantenimiento de equipos.</h3>
                            </div>
                        </div>
                </div>

            </div>
            <div style="background-color: #4b4a5c;">
                <p style="margin:13px 0;color:white;text-align: right;font-size: medium;padding-right: 100px;padding-top: 10px;padding-bottom: 10px;">
                    Desarrollado por <a style="color:#ef9f0b; font-weight: 700;" href="https://altosentido.net" target="_blank">Altosentido.net</a>
                </p>
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
