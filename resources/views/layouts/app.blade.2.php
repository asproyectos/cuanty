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
    <base href="../../">
    <meta charset="utf-8" />
    <title>Termovalle - Rondas de operaciones</title>
    <meta name="description" content="Medidor Aspectos Socioeconómico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('css/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/altosentido.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.png') }}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="/home">
                <img alt="Logo" src="{{ asset('media/logos/logo-sidebar.png') }}" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
        </div>
    </div>

    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- begin:: Aside -->

            <!-- Uncomment this to display the close button of the panel
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
        -->
        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside" style="background-color: #ffffff;">

            <!-- begin:: Aside -->
            <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand" style="background-color: #ffffff; padding: 0 10px;">
                <div class="kt-aside__brand-logo" style="margin-top: 20px;">
                    <a href="/home">
                        <img style="width:100%;" alt="Logo" src="{{ asset('media/logos/logo-sidebar.png') }}" />
                    </a>
                </div>
                <div class="kt-aside__brand-tools">
                    <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                        <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                                <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                            </g>
                        </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                            </g>
                        </svg></span>
                    </button>

                    <!--
                    <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
                -->
            </div>
        </div>

        <!-- end:: Aside -->

        <!-- begin:: Aside Menu -->
        <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper" style="background-color: #363545;">
            <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500" style="background-color: #363545;">
                <ul class="kt-menu__nav ">
                    <li class="{{Request::is('home') ? 'kt-menu__item--open' : ''}} kt-menu__item " aria-haspopup="true"><a href="/home" class="kt-menu__link "><img style="margin-right:5px; width: 25px;" src="{{ asset('media/icons/ico-menu-inicio.png') }}" alt=""><span class="kt-menu__link-text">INICIO</span></a></li>
                    <hr>
                    <li class="kt-menu__item  kt-menu__item--submenu {{ Request::is('rondas*', 'reportes', 'analisis', 'anotaciones') ? 'kt-menu__item--open' : ''}}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><img style="margin-right:5px; width: 25px;" src="{{ asset('media/icons/ico-menu-rondas.png') }}" alt=""><span class="kt-menu__link-text">RONDAS</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                            <ul class="kt-menu__subnav">
                                <li class="kt-menu__item {{ Request::is('rondas*') ? 'kt-menu__item--open' : ''}}" aria-haspopup="true"><a href="{{ route('rondas.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">LISTADO DE RONDAS</span></a></li>
                                <li class="kt-menu__item {{ Request::is('reportes*') ? 'kt-menu__item--open' : ''}}" aria-haspopup="true"><a href="{{ route('reportes.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">REPORTE DIARIO</span></a></li>
                                <li class="kt-menu__item {{ Request::is('analisis') ? 'kt-menu__item--open' : ''}}" aria-haspopup="true"><a href="{{ route('equipos.analisis') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">ANÁLISIS</span></a></li>
                                <li class="kt-menu__item {{ Request::is('anotaciones') ? 'kt-menu__item--open' : ''}}" aria-haspopup="true"><a href="{{ route('rondas.anotaciones') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">ANOTACIONES</span></a></li>
                            </ul>

                        </div>
                    </li>
                    <li class="kt-menu__item  kt-menu__item--submenu {{ Request::is('sistemas*', 'equipos*', 'ruta') ? 'kt-menu__item--open' : ''}}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><img style="margin-right:5px; width: 25px;" src="{{ asset('media/icons/ico-menu-planta.png') }}" alt=""><span class="kt-menu__link-text">PLANTA</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                            <ul class="kt-menu__subnav">
                                <li class="kt-menu__item {{ Request::is('sistemas*') ? 'kt-menu__item--open' : ''}}" aria-haspopup="true"><a href="{{ route('sistemas.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">SISTEMAS</span></a></li>
                                <li class="kt-menu__item {{ Request::is('equipos*') ? 'kt-menu__item--open' : ''}}" aria-haspopup="true"><a href="{{ route('equipos.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">EQUIPOS</span></a></li>
                                <li class="kt-menu__item {{ Request::is('ruta') ? 'kt-menu__item--open' : ''}}" aria-haspopup="true"><a href="{{ route('rutas.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">RUTA</span></a></li>
                            </ul>

                        </div>
                    </li>
                    <li class="kt-menu__item {{Request::is('usuarios') ? 'kt-menu__item--open' : ''}}" aria-haspopup="true"><a href="{{ route('usuarios.index') }}" class="kt-menu__link "><img style="margin-right:5px; width: 25px;" src="{{ asset('media/icons/ico-menu-usuarios.png') }}" alt=""><span class="kt-menu__link-text">PERSONAL</span></a></li>
                    {{-- <li class="kt-menu__item {{Request::is('configuracion*') ? 'kt-menu__item--open' : ''}}" aria-haspopup="true"><a href="{{ route('configuracion.index') }}" class="kt-menu__link "><img style="margin-right:5px; width: 25px;" src="{{ asset('media/icons/ico-menu-configuracion.png') }}" alt=""><span class="kt-menu__link-text">CONFIGURACIÓN</span></a></li> --}}
                    <hr>
                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="kt-menu__link "><img style="margin-right:5px; width: 25px;" src="{{ asset('media/icons/ico-cerrar-sesion.png') }}" alt=""><span class="kt-menu__link-text">Cerrar sesión</span></a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>

        <!-- end:: Aside Menu -->
    </div>

    <!-- end:: Aside -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style=" padding-top: 52px; ">

        <!-- begin:: Header -->
        <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " style="background-color: #ffffff;box-shadow: 0px 0px 4px 0px #888888;">

            <!-- begin:: Header Menu -->
            <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper"> </div>
            <!-- end:: Header Menu -->

            <!-- begin:: Header Topbar -->
            <div class="kt-header__topbar">
                <!--begin: Notifications -->
                {{-- <div class="kt-header__topbar-item dropdown">
                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
                <span class="kt-header__topbar-icon kt-pulse kt-pulse--brand">
                <i class="fa fa-bell" style="height:24;"></i>
            </span>
        </div>
    </div> --}}

    <!--end: Notifications -->

    <!--begin: Quick Actions -->
    {{-- <div class="kt-header__topbar-item dropdown">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
    <span class="kt-header__topbar-icon">
    <i class="fa fa-list-alt" style="height:24;"></i>
</span>
</div>
</div> --}}
<!--end: Quick Actions -->

<!--begin: User Bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
        <div class="kt-header__topbar-user">
            <span class="kt-header__topbar-welcome kt-hidden-mobile">Hola,</span>
            <span class="kt-header__topbar-username kt-hidden-mobile">{{ Auth::user()->name }}</span>
            {{-- <img class="kt-hidden" alt="Pic" src="{{ asset('media/users/300_25.jpg') }}" /> --}}
            <img class="kt-widget3__img" src="{{ asset('imagenes_usuarios/'.Auth::user()->imagen) }}" style="border-radius: 50%; max-height: 60px;">

            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
            {{-- <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span> --}}
        </div>
    </div>
</div>

<!--end: User Bar -->
</div>

<!-- end:: Header Topbar -->
</div>

<!-- end:: Header -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">


    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        @yield('content')
    </div>

    <!-- end:: Content -->
</div>

<!-- begin:: Footer -->
<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer" style="background:#4b4a5c;">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-footer__menu">
        </div>
        <div class="kt-footer__copyright" style="color:white">
            Desarrollado por<a style="color:#ef9f0b; margin-left: 5px;" href="https://www.altosentido.net" target="_blank" class="kt-link">Altosentido.net</a>
        </div>
    </div>
</div>

<!-- end:: Footer -->
</div>
</div>
</div>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop" style="background: #5a96e5;">
    <i class="fa fa-arrow-up"></i>
</div>

<!-- end::Scrolltop -->

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
<script type="text/javascript">
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
@if (Session::has('status'))
toastr.{{ Session::get('status')[0] }}('{{ Session::get('status')[1] }}');
@endif
</script>

@yield('scripts')

</body>

<!-- end::Body -->
</html>
