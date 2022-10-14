@extends('layouts.plantilla')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Modificar datos de la asignación</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Asignacion </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                  action="{{ route('asignacion.update',[$asignacion->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idMicro">Micro (Nro. de Interno)
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="idMicro" class="form-control" id="idMicro" required>
                                            <option value="">Seleccione micro (Nro. de Interno)</option>
                                            @foreach($micros as $micro)
                                                <option value="{{$micro->id}}"
                                                        {{old('idMicro',$asignacion->idMicro)== $micro->id ? 'selected':''}}
                                                >{{$micro->nroInterno}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idChofer">Chofer
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="idChofer" class="form-control" id="idChofer" required>
                                            <option value="">Seleccione chofer</option>
                                            @foreach($choferes as $chofer)
                                                <option value="{{$chofer->id}}"
                                                        {{old('idChofer',$asignacion->idChofer)== $chofer->id ? 'selected':''}}
                                                >{{$chofer->persona->nombre}} {{$chofer->persona->apellido}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idTipoAsignacion">Tipo de asignación
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="idTipoAsignacion" class="form-control" id="idTipoAsignacion" required>
                                            <option value="">Seleccione una opción</option>
                                            @foreach($tipoAsignaciones as $tipoAsignacion)
                                                <option value="{{$tipoAsignacion->id}}"
                                                        {{old('idTipoAsignacion',$asignacion->idTipoAsignacion)== $tipoAsignacion->id ? 'selected':''}}
                                                >{{$tipoAsignacion->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fechaInicio">Fecha
                                        de Inicio <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="date" id="fechaInicio" name="fechaInicio"
                                               required="required" class="form-control" value={{$asignacion->fechaInicio}}>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fechaFin">Fecha
                                        de finalización <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="date" id="fechaFin" name="fechaFin"
                                               required="required" class="form-control" value={{$asignacion->fechaFin}}>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="rentaDiaria">Renta diaria (por uso de micro)
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step='0.01' id="rentaDiaria" name="rentaDiaria" required="required"
                                               class="form-control " value={{$asignacion->rentaDiaria}}>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pagoChofer">Pago a chofer (por día)
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step='0.01' id="pagoChofer" name="pagoChofer" required="required" class="form-control" value={{$asignacion->pagoChofer}}>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="montoRecaudado">Monto recaudado
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step='0.01' id="montoRecaudado" name="montoRecaudado" required="required" class="form-control" value="{{$asignacion->montoRecaudado}}">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="detalle">Detalle
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="detalle" name="detalle"
                                                required="required" class="form-control" value="{{$asignacion->detalle}}">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idSancion">Sancion
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="idSancion" class="form-control" id="idSancion">
                                            <option value="">Seleccione una opción</option>
                                            @foreach($sanciones as $sancion)
                                                <option value="{{$sancion->id}}"
                                                        @if($asignacionSanciones){{old('idSancion',$asignacionSanciones->idSancion)== $sancion->id ? 'selected':''}}@endif
                                                >{{$sancion->detalle}} - {{$sancion->montoApagar}} Bs.</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="motivo">Motivo
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="motivo" name="motivo" class="form-control"
                                               value="@if($asignacionSanciones){{$asignacionSanciones->motivo}}@endif">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function cambiosDeEstado() {
        var socio = document.getElementById("socio");
        var chofer = document.getElementById("chofer");
        var disponible = document.getElementById("disponible");
        var nroLicencia = document.getElementById("nroLicencia");
        var categoria = document.getElementById("categoria");
        var codigo = document.getElementById("codigo");
        var email = document.getElementById("email");
        socio.onclick = function () {
            if (socio.checked) {
                chofer.checked = null;
                disponible.checked = null;
                disponible.disabled = socio.checked;
                codigo.disabled = false;
                email.disabled = false;
                nroLicencia.disabled = true;
                nroLicencia.value = "";
                categoria.disabled = true;
                categoria.value = "";
            }
        }
        chofer.onclick = function () {
            if (chofer.checked) {
                socio.checked = null;
                disponible.disabled = false;
                disponible.checked = true;
                nroLicencia.disabled = false;
                categoria.disabled = false;
                codigo.disabled = true;
                codigo.value = "";
                email.disabled = true;
                email.value = "";
            }
        }
    }
</script>