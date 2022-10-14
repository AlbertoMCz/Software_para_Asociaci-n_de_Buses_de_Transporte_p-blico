@extends('layouts.plantilla')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Asignaciones
                        <small></small>
                    </h3>
                </div>

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-10 col-sm-10  ">
            <div class="x_panel">
                <a type="button" href="{{route('asignacion.create')}}" class="btn btn-primary">Registrar asignación</a>
                <div class="x_title">
                    <h2>Listado de asignaciones
                        <small></small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Chofer</th>
                            <th>Micro</th>
                            <th>Tipo de asignación</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Accion</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($asignaciones as $asignacion)
                            <tr>
                                <th scope="row">{{$asignacion->id}}</th>
                                <td>{{$asignacion->chofer->persona->nombre}} {{$asignacion->chofer->persona->apellido}}</td>
                                <td>{{$asignacion->micro->nroInterno}}</td>
                                <td>{{$asignacion->tipoAsignacion->nombre}}</td>
                                <td>{{$asignacion->fechaInicio}}</td>
                                <td>{{$asignacion->fechaFin}}</td>
                                <td>
                                    <form action="{{ route('asignacion.destroy',$asignacion->id) }}" method="POST">
                                        <a href="{{ route('asignacion.edit',$asignacion->id) }}"
                                           class="btn btn-outline-warning btn-m"><span><i class="fa fa-edit"
                                                                                          style="margin-left:-5px;"></i></span></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-m"><span><i
                                                        class="fa fa-eraser" style="margin-left:-5px;"></i></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
