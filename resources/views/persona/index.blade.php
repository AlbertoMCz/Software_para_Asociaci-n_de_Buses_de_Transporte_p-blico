@extends('layouts.plantilla')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Personas <small></small></h3>
        </div>

    </div>
    </div>
    
    <div class="clearfix"></div>
    
        <div class="col-md-10 col-sm-10  ">
            <div class="x_panel">
            <a type="button" href="{{route('persona.create')}}" class="btn btn-primary">Registrar</a>
                <div class="x_title">
                <h2>Listado de personas <small></small></h2>
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
                        <th>Apellido</th>
                        <th>Carné de Identidad</th>
                        <th>Género</th>
                        <th>Tipo</th>
                        <th>Accion</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($personas as $persona)
                    <tr>
                        <th scope="row">{{$persona->id}}</th>
                        <td>{{$persona->nombre}}</td>
                        <td>{{$persona->apellido}}</td>
                        <td>{{$persona->ci}}</td>
                        <td>{{$persona->genero}}</td>
                        <td>{{$persona->tipo($persona->tipoPersona)}}</td>
                        <td>
                            <form action="{{ route('persona.destroy',$persona->id) }}" method="POST">
                                {{-- <a class="btn btn-info" href="{{ route('persona.edit',$persona->id) }}">Editar</a> --}}
                                <a href="{{ route('persona.edit',$persona->id) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>

                                @csrf
                                @method('DELETE')
                                 <button type="submit" class="btn btn-danger">Borrar</button>
                                {{-- <a class="btn btn-outline-danger btn-m" ><span><i class="fa fa-eraser" style="margin-left:-5px;"></i></span></a> --}}

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
</div>
<!-- /page content -->
@endsection
