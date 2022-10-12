@extends('layouts.plantilla')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Tipos de Asignaciones <small></small></h3>
        </div>

    </div>
    </div>
    
    <div class="clearfix"></div>
    
        <div class="col-md-10 col-sm-10  ">
        <div class="x_panel">
        <a type="button" href="{{route('tipoAsignacion.create')}}" class="btn btn-primary">Crear</a>
            <div class="x_title">
            <h2>Lista de tipo de asignaciones <small></small></h2>
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
                    <th>Nombre</th>
                    <th>Detalle</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tipoAsignaciones as $tipoAsignacion)
                <tr>
                    <th scope="row">{{$tipoAsignacion->id}}</th>
                    <td>{{$tipoAsignacion->nombre}}</td>
                    <td>{{$tipoAsignacion->detalle}}</td>
                    <td>
            <a href="{{ route('tipoAsignacion.edit',[$tipoAsignacion->id]) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>
            <a href="{{ route('tipoAsignacion.destroy',[$tipoAsignacion->id]) }}" class="btn btn-outline-danger btn-m" ><span><i class="fa fa-eraser" style="margin-left:-5px;"></i></span></a>
         </td>
                </tr>
                @endforeach
                </tbody>
            </table>

            </div>
        </div>
        </div>

                    
    </div>
</div>
<!-- /page content -->
@endsection