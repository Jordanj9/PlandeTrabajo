@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span>
                    <a href="{{route('admin.plan')}}"> Módulo Planes </a>
                    <span class="fa-angle-right fa"></span>
                    Actividades del Docente
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
                        <h4 class="card-title">PLANES - PLAN DE TRABAJO- ACTIVIDADES DEL DOCENTE</h4>
                    </div>
                    <div class="pull-right col-md-6">
                        <ul class="navbar-nav pull-right">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a href="{{ route('plandetrabajo.create') }}" class="dropdown-item" href="#">Agregar
                                        nueva Actividad Docente </a>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                       data-target="#mdModal">Ayuda</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                               width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>CODIGO</th>
                                <th>DOCENTE</th>
                                <th>PERIODO</th>
                                <th>CREADO</th>
                                <th>ACCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($planes as $plan)
                                <tr>
                                    <td>{{$plan->id}}</td>
                                    <td>{{$plan->docente->primer_nombre.' '.$plan->docente->primer_apellido}}</td>
                                    <td>{{$plan->periodo->anio.'-'.$plan->periodo->periodo}}</td>
                                    <td>{{$plan->created_at}}</td>
                                    <td>
                                        <a href="{{route('menuActividades',$plan->id)}}"
                                           class="btn btn-link btn-success btn-just-icon remove"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="Gestionar cuadros Explicativos-Actividades Docentes"><i
                                                class="material-icons">note_add</i></a>
                                        <a target="_blank" href="{{ route('plandetrabajo.imprimir',$plan->id)}}"
                                           class="btn btn-link btn-just-icon remove" data-toggle="tooltip"
                                           data-placement="top" style="color: #38A970" title="Imprimir"><i
                                                class="material-icons">print</i></a>

                                        <a href="{{route('horario',$plan->id)}}"
                                           class="btn btn-link btn-warning btn-just-icon remove"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="Gestionar Horario del Plan"><i class="material-icons">
                                                calendar_today
                                            </i></a>

                                        <a href="{{ route('plandetrabajo.delete',$plan->id)}}"
                                           class="btn btn-link btn-danger btn-just-icon remove"
                                           data-toggle="tooltip"
                                           data-placement="top" title="Eliminar plan de trabajo"><i
                                                class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>CODIGO</th>
                                <th>DOCENTE</th>
                                <th>PERIODO</th>
                                <th>CREADO</th>
                                <th>ACCIONES</th>
                            </tr>
                            </tfoot>
                        </table>
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
                    <strong>Detalles: </strong>Gestione cada una de las actividades del docente y las complementarias
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">ACEPTAR</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-mini modal-primary" id="addUnidad" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                            class="material-icons">clear</i></button>
                </div>
                <div class="modal-body">
                    <strong>Detalles: </strong>Gestione cada una de las actividades del docente y las complementarias.
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
