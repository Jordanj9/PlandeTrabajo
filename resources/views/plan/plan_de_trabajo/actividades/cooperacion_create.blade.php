@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.usuarios')}}"> Usuarios </a><span
                        class="fa-angle-right fa"></span><a href="{{route('pagina.index')}}"> Página
                        del Sistema </a><span class="fa-angle-right fa"></span> Crear
                </p>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text col-md-6">
                        <h4 class="card-title">DATOS DE COOPERACION INTERINSTITUCIONAL</h4>
                    </div>
                    <div class="pull-right col-md-6">
                        <ul class="navbar-nav pull-right">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                       data-target="#mdModal">Ayuda</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        @component('layouts.errors')
                        @endcomponent
                    </div>
                    <div class="col-md-12">
                        <form class="form-horizontal" method="POST" action="{{route('guardar_trabajo')}}">
                            @csrf
                            <input type="hidden" value="{{$plan}}" name="plandetrabajo_id">
                            <input type="hidden" value="4" name="item_id">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="">Actividades</label>
                                            <br/><input type="text" class="form-control"
                                                        placeholder="" name="titulo"
                                                        required="required"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="">Descripción</label>
                                            <br/><input type="text" class="form-control"
                                                        placeholder="" required
                                                        name="descripcion"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="">Institución</label>
                                            <br/><input type="text" class="form-control"
                                                        placeholder=""
                                                        name="institucion" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="">Fecha</label>
                                            <br/><input type="date" class="form-control"
                                                        placeholder=""
                                                        name="fecha" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Terminación">Horas / Semana</label>
                                            <br/><input type="number" class="form-control"
                                                        placeholder="" min="0"
                                                        name="hora_semana" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <br/><br/><a href="{{route('pagina.index')}}" class="btn btn-danger btn-round">Cancelar</a>
                                    <button class="btn btn-info btn-round" type="reset">Limpiar Formulario</button>
                                    <button class="btn btn-success btn-round" type="submit">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-mini modal-primary" id="mdModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                            class="material-icons">clear</i></button>
                </div>
                <div class="modal-body">
                    <strong>Agregue nuevas páginas,</strong> el nombre de la página no debe llevar acentos, eñes (ñ) ni
                    caracteres especiales, el nombre de la página debe iniciar con "PAG_" seguido del nombre que usted
                    desee. Las paginas o ítems de los módulos del sistema son las funcionalidades más específicas o
                    detalladas de los módulos. Ejemplo de página general: PAG_MODULOS, PAG_PAGINAS, PAG_USUARIOS,
                    PAG_PRIVILEGIOS, ETC.
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">ACEPTAR</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });

            var table = $('#datatable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });
    </script>
@endsection

