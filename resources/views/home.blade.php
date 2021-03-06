@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a href="{{route('usuario.vistacontrasenia')}}">
                        <div class="card card-stats">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">vpn_key</i>
                                </div>
                                <p class="card-category">Cambiar</p>
                                <h3 class="card-title">Contraseña</h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </a>
                </div>
            @if(session()->exists('MOD_USUARIOS'))
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a href="{{route('admin.usuarios')}}">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">supervised_user_circle</i>
                                </div>
                                <p class="card-category">Modulo</p>
                                <h3 class="card-title">Usuario</h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if(session()->exists('MOD_ACADEMICO'))
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a href="{{route('admin.academico')}}">
                        <div class="card card-stats">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">account_balance</i>
                                </div>
                                <p class="card-category">Modulo</p>
                                <h3 class="card-title">Académico</h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if(session()->exists('MOD_PLAN'))
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a href="{{route('admin.plan')}}">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <p class="card-category">Modulo</p>
                                <h3 class="card-title">Planes</h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </a>
                </div>
            @endif
                @if(session()->exists('MOD_EVALUACION'))
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <a href="{{route('admin.evaluacion')}}">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">speaker_notes</i>
                                    </div>
                                    <p class="card-category">Modulo</p>
                                    <h3 class="card-title">Evaluación</h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @if(session()->exists('MOD_REPORTE'))
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a href="{{route('admin.usuarios')}}">
                        <div class="card card-stats">
                            <div class="card-header card-header-azul card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">trending_up</i>
                                </div>
                                <p class="card-category">Modulo</p>
                                <h3 class="card-title">Reportes</h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               style="color: white"><i class="material-icons">toggle_off</i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <p class="card-category">Cerrar</p>
                        <h3 class="card-title">Sesión</h3>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
