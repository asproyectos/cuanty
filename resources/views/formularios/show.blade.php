@extends('layouts.app')

@section('contenido')
    <div class="wrapper">
        <div class="authentication-header bg-login"></div>
        <div class="d-flex align-items-center justify-content-center my-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto mt-5">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="cuanty-ico">
                                        <img src="assets/images/cuanty/favicon-cuanty-180.png">
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12 mx-auto">
                                            <div class="text-center">
                                                <h3 class="">{{ $formulario->nombre }}</h3>
                                                {{-- <p>
                                                    Ya tienes cuenta?
                                                    <a href="01-login.html">Inicia sesión</a>
                                                </p> --}}
                                            </div>
                                            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Ver detalle
                                            </button>
                                            <div class="card">
                                                <div class="card-body">
                                                    <br>
                                                    <p>
                                                        <!-- SmartWizard html -->
                                                        {{-- <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('proyectos.encuesta.store', ['proyecto' => $proyecto->id]) }}" role="form"> --}}
                                                        @if (($estadoFormulario['numeroIntentosFaltantes'] > 0) & ($estadoFormulario['numeroIntentosFaltantes'] <= 5))
                                                            <form id="registro" class="kt-form kt-form--label-right"
                                                                method="POST" action="{{ route('answers.store') }}"
                                                                role="form" enctype="multipart/form-data">
                                                                @csrf
                                                                <div id="smartwizard">
                                                                    <div
                                                                        class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                                                                        <div class="ms-auto"></div>
                                                                    </div>
                                                                    <ul class="nav">
                                                                        @foreach ($formulario->grupoPreguntas as $valor => $gp)
                                                                            <li class="nav-item">
                                                                                <a class="nav-link"
                                                                                    href="#paso-{{ $valor + 1 }}"><strong>{{ $valor + 1 }}</strong>
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    <div class="tab-content">
                                                                        @foreach ($formulario->grupoPreguntas as $valor => $gp)
                                                                            <div id="paso-{{ $valor + 1 }}"
                                                                                class="tab-pane" role="tabpanel"
                                                                                aria-labelledby="paso-{{ $valor + 1 }}">
                                                                                <div class="mb-3">
                                                                                    <label class="form-label">
                                                                                        <h4 class="title-form">
                                                                                            {{ $gp->nombre }}
                                                                                        </h4>
                                                                                        <h5 class="description-form">
                                                                                            {{ $gp->subtitulo }}
                                                                                        </h5>
                                                                                    </label>
                                                                                    <div class="row">
                                                                                        @foreach ($gp->preguntas as $pregunta)
                                                                                            <div class="col-sm-12">
                                                                                                <label class="form-label">
                                                                                                    {{ $pregunta->descripcion }}
                                                                                                </label>
                                                                                                @switch($pregunta->tipo_pregunta_id)
                                                                                                    @case(4)
                                                                                                        <input
                                                                                                            name="{{ $pregunta->id }}"
                                                                                                            class="form-control form-control-sm"
                                                                                                            type="text"
                                                                                                            placeholder=""
                                                                                                            aria-label=".form-control-lg example">
                                                                                                    @break

                                                                                                    @case(3)
                                                                                                        <input
                                                                                                            name="{{ $pregunta->id }}"
                                                                                                            class="form-control form-control-sm"
                                                                                                            type="number"
                                                                                                            placeholder=""
                                                                                                            aria-label=".form-control-lg example">
                                                                                                    @break

                                                                                                    @case(5)
                                                                                                        <input
                                                                                                            name="{{ $pregunta->id }}"
                                                                                                            class="form-control form-control-sm"
                                                                                                            type="date"
                                                                                                            placeholder=""
                                                                                                            aria-label=".form-control-lg example">
                                                                                                    @break

                                                                                                    @case(6)
                                                                                                        <input
                                                                                                            name="{{ $pregunta->id }}"
                                                                                                            class="form-control form-control-sm"
                                                                                                            type="email"
                                                                                                            placeholder=""
                                                                                                            aria-label=".form-control-lg example">
                                                                                                    @break

                                                                                                    @case(7)
                                                                                                        <input
                                                                                                            name="{{ $pregunta->id }}"
                                                                                                            class="form-control form-control-sm"
                                                                                                            type="password"
                                                                                                            placeholder=""
                                                                                                            aria-label=".form-control-lg example">
                                                                                                    @break

                                                                                                    @case(8)
                                                                                                        <input
                                                                                                            name="{{ $pregunta->id }}"
                                                                                                            class="form-control form-control-sm"
                                                                                                            type="file"
                                                                                                            placeholder=""
                                                                                                            aria-label=".form-control-lg example">
                                                                                                    @break

                                                                                                    @case(1)
                                                                                                        <div class="input-group">
                                                                                                            <select
                                                                                                                name="{{ $pregunta->id }}"
                                                                                                                class="single-select form-select">
                                                                                                                <option selected>
                                                                                                                    Selecciona...
                                                                                                                </option selected>
                                                                                                                @foreach ($pregunta->opciones as $opcion)
                                                                                                                    <option
                                                                                                                        value="{{ $opcion->nombre }}">
                                                                                                                        {{ $opcion->nombre }}
                                                                                                                    </option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    @break

                                                                                                    @default
                                                                                                @endswitch
                                                                                                <hr>
                                                                                                <br>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            @if (session('success'))
                                                                <script>
                                                                    Swal.fire({
                                                                        position: 'center',
                                                                        icon: 'success',
                                                                        title: @json(session('success')),
                                                                        showConfirmButton: false,
                                                                        timer: 1500
                                                                    })
                                                                </script>
                                                            @endif
                                                        @else
                                                            <div class="d-flex justify-content-center">
                                                                <h6><span class="badge bg-warning text-dark">Intentos
                                                                        permitidos completados</span>
                                                                </h6>
                                                            </div>
                                                        @endif
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                            <!--end page wrapper -->
                            <!--start overlay-->
                            <div class="overlay toggle-icon"></div>
                            <!--end overlay-->
                            <!--Start Back To Top Button-->
                            <a href="javaScript:;" class="back-to-top">
                                <i class="bx bxs-up-arrow-alt"></i>
                            </a>
                            <!--End Back To Top Button-->
                            <footer class="bg-white shadow-sm border-top p-2 text-center fixed-bottom">
                                <p class="mb-0"> Cuanty © 2022. Todos los derechos reservados. </p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Detalle formulario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <div class="table-responsive"> --}}
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Formulario</th>
                                    <th scope="col">Intentos Permitidos</th>
                                    <th scope="col">Intentos Restantes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{ Auth()->user()->name }}</th>
                                    <td>{{ $estadoFormulario['nombreFormulario'] }}</td>
                                    <td>{{ $estadoFormulario['numeroIntentosPermitidos'] }}</td>
                                    <td>{{ $estadoFormulario['numeroIntentosFaltantes'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    {{-- </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
