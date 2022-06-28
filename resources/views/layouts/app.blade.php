<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--favicon-->
  <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png">
  <!--plugins-->
  <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css">
  <!-- loader-->
  <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/js/pace.min.js') }}"></script>
  <!-- Bootstrap CSS -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
  <!-- Theme Style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}">
  <title>Cuanty</title>
</head>

<body>
  <!--wrapper-->
  <div class="wrapper">
    <!--start header wrapper-->
    <div class="header-wrapper">
      <!--start header -->
      <header>
        <div class="topbar d-flex align-items-center">
          <nav class="navbar navbar-expand">
            <div class="topbar-logo-header">
              <div class="">
                <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
              </div>
              <div class="">
                <h4 class="logo-text">Cuanty</h4>
              </div>
            </div>
            <div class="mobile-toggle-menu">
              <i class="bx bx-menu"></i>
            </div>
            <div class="search-bar flex-grow-1">
              <div class="position-relative search-bar-box">
                <input type="text" class="form-control search-control" placeholder="Que deseas buscar...">
                <span class="position-absolute top-50 search-show translate-middle-y">
                  <i class="bx bx-search"></i>
                </span>
                <span class="position-absolute top-50 search-close translate-middle-y">
                  <i class="bx bx-x"></i>
                </span>
              </div>
            </div>
            <div class="top-menu ms-auto">
              <ul class="navbar-nav align-items-center">
                <li class="nav-item mobile-search-icon">
                  <a class="nav-link" href="#">
                    <i class="bx bx-search"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="user-box dropdown">
              <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="assets/images/avatars/as.png" class="user-img" alt="user avatar">
                <div class="user-info ps-3">
                  <p class="user-name mb-0">ALTOSENTIDO</p>
                  <p class="designattion mb-0">info@altosentido.net</p>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <i class="bx bx-user"></i>
                    <span>Perfil</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <i class="bx bx-cog"></i>
                    <span>Configuración</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <i class="bx bx-bulb"></i>
                    <span>Ayuda</span>
                  </a>
                </li>
                <li>
                  <div class="dropdown-divider mb-0"></div>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <i class="bx bx-log-out-circle"></i>
                    <span>Cerrar sesión</span>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      <!--end header -->
      <!--navigation-->
      <div class="nav-container">
        <div class="mobile-topbar-header">
          <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
          </div>
          <div>
            <h4 class="logo-text">Cuanty</h4>
          </div>
          <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
          </div>
        </div>
        <nav class="topbar-nav">
          <ul class="metismenu" id="menu">
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Inicio</div>
              </a>
              <ul>
                <li> <a href="{{route('formularios.empresa')}}"><i class="bx bx-right-arrow-alt"></i>Empresa</a>
                </li>
                <li> <a href="Socios.html"><i class="bx bx-right-arrow-alt"></i>Socios</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Reportes</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Diagnostico</div>
              </a>
              <ul>
                <li> <a href="{{route('formularios.perfil-emprendedor')}}"><i class="bx bx-right-arrow-alt"></i>Perfil emprendedores</a>
                </li>
                <li> <a href="{{route('formularios.direccionamiento-estrategico')}}"><i class="bx bx-right-arrow-alt"></i>Direccionamiento
                    estratégico</a>
                </li>
                <li> <a href="{{route('formularios.financiero')}}"><i class="bx bx-right-arrow-alt"></i>Financiero</a>
                </li>
                <li> <a href="{{route('formularios.mercadeo-y-ventas')}}"><i class="bx bx-right-arrow-alt"></i>Mercadeo y ventas</a>
                </li>
                <li> <a href="{{route('formularios.gestion-tecnica')}}"><i class="bx bx-right-arrow-alt"></i>Gestión técnica y producción</a>
                </li>
                <li> <a href="{{route('formularios.administracion-normativa')}}"><i class="bx bx-right-arrow-alt"></i>Administración,
                    normatividad y talento humano</a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
      <!--end navigation-->
      </li>
      </ul>
      </nav>
    </div>
    <!--end navigation-->
  </div>
  <!--end header wrapper-->
  <!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        @yield('contenido')
    </div>
</div>
<!--end wrapper-->
<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
<script
src="https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js"
referrerpolicy="origin"></script>
<script src="{{ asset('assets/plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('assets/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
<script src="{{ asset('assets/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
<script>
$('#fancy-file-upload').FancyFileUpload({
    params: {
        action: 'fileuploader'
    },
    maxfilesize: 1000000
});
</script>
<script>
$(document).ready(function () {
    $('#image-uploadify')
    .imageuploadify();
})
</script>
                  <!--app JS-->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script>
$(document).ready(function () {
    // Toolbar extra buttons
    var btnFinish = $( "<button type='submit'></button>") .text("Finalizar") .addClass("btn btn-success finalizar-formulario");
    var btnCancel = $( "<button></button>") .text("Cancelar") .addClass("btn btn-danger") .on("click", function () {
        $("#smartwizard") .smartWizard( "reset");
    });
    // Step show event
    $("#smartwizard").on( "showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
        $("#prev-btn") .removeClass( "disabled");
        $("#next-btn") .removeClass( "disabled");
        if (stepPosition === "first") {
            $("#prev-btn") .addClass( "disabled");
        } else if ( stepPosition === "last") {
            $("#next-btn") .addClass( "disabled");
            $(".finalizar-formulario") .removeClass( "disabled");
        } else {
            $(".finalizar-formulario") .addClass( "disabled");
            $("#prev-btn") .removeClass( "disabled");
            $("#next-btn") .removeClass( "disabled");
        }
    });
    // Smart Wizard
    $("#smartwizard").smartWizard({
        selected: 0,
        theme: "dots",
        transition: {
            animation: "slide-horizontal", // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
        },
        toolbarSettings: {
            toolbarPosition: "both", // both bottom
            toolbarExtraButtons: [
                btnFinish,
                btnCancel
            ],
        },
    });
    // External Button Events
    $("#reset-btn").on("click", function () {
        // Reset wizard
        $("#smartwizard").smartWizard( "reset");
        return true;
    });
    $("#prev-btn").on("click", function () {
        // Navigate Anterior
        $("#smartwizard") .smartWizard( "prev");
        return true;
    });
    $("#next-btn").on("click", function () {
        // Navigate next
        $("#smartwizard") .smartWizard( "next");
        return true;
    });
    // Demo Button Events
    $("#got_to_step").on("change", function () {
        // Go to step
        var step_index = $(this) .val() - 1;
        $("#smartwizard") .smartWizard( "goToStep", step_index);
        return true;
    });
    $("#is_justified").on("click", function () {
        // Change Justify
        var options = {
            justified: $( this) .prop( "checked" ),
        };
        $("#smartwizard") .smartWizard( "setOptions", options);
        return true;
    });
    $("#animation").on("change", function () {
        // Change theme
        var options = {
            transition: {
                animation: $( this ) .val(),
            },
        };
        $("#smartwizard") .smartWizard( "setOptions", options);
        return true;
    });
    $("#theme_selector").on("change", function () {
        // Change theme
        var options = {
            theme: $(this) .val(),
        };
        $("#smartwizard") .smartWizard( "setOptions", options);
        return true;
    });
});
</script>
<script>
tinymce.init({
    selector: '#mytextarea'
});
</script>
<!--app JS-->
{{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}
</body>

</html>
