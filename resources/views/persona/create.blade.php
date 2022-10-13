@extends('layouts.plantilla')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Registrar Persona</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Persona </h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('persona.store') }}" method="post" >
                                    @csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Nombre <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="nombre" name="nombre" required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Apellido <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="apellido" name="apellido" required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="fechaNacimiento">Fecha de Nacimiento <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" id="fechaNacimiento" name="fechaNacimiento" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="ci">Carné de identidad <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="ci" name="ci" required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="nacionalidad">Nacionalidad <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="nacionalidad" name="nacionalidad" required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="genero">Género <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="genero" class="form-control" id="genero" name="genero" required>
													<option value="">Seleccione una opción</option>
													@foreach($generos as $genero)
														<option value="{{$genero}}">{{$genero}}</option>
													@endforeach
												</select>
											</div>
										</div>

										{{-- ATRIBUTOS DEL SOCIO --}}
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 ">
												<div class="checkbox">
													<label>
														<input type="checkbox" id="socio" onclick="cambiosDeEstado()" name="tipoPersona" value="S">
													Socio</label>
												</div>

												<div class="item form-group">
													<label class="col-form-label col-md-2 col-sm-2 label-align" for="codigo">Código <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6 ">
														<input type="text" id="codigo" name="codigo" class="form-control">
													</div>
												</div>
												<div class="item form-group">
													<label class="col-form-label col-md-2 col-sm-2 label-align" for="email">Email <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6 ">
														<input type="text" id="email" name="email" class="form-control">
													</div>
												</div>
											</div>


											{{-- ATRIBUTOS DEL CHOFER --}}
											<div class="col-md-6 col-sm-6 ">
												<div class="checkbox">
													<label>
														<input type="checkbox" id="chofer" onclick="cambiosDeEstado()" name="tipoPersona" value="C">
													Chofer</label>
												</div>

												<div class="item form-group">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="nroLicencia">Nro. de licencia <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6 ">
														<input type="text" id="nroLicencia" name="nroLicencia" class="form-control">
													</div>
												</div>
												<div class="item form-group">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="categoria">Categoría <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6 ">
														<input type="text" id="categoria" name="categoria" class="form-control">
													</div>
												</div>
												<div class="item form-group">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="disponible">Disponible <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input type="checkbox" id="disponible" name="disponible" value="1" checked disabled>
													</div>
												</div>

											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-success">Registrar</button>
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
        socio.onclick = function(){
            if(socio.checked){
                chofer.checked = null;
                disponible.checked = null; disponible.disabled = socio.checked; codigo.disabled = false; email.disabled = false;
                nroLicencia.disabled = true; nroLicencia.value = ""; categoria.disabled = true; categoria.value = "";
            }
        }
        chofer.onclick = function(){
            if(chofer.checked){
                socio.checked = null;
                disponible.disabled = false; disponible.checked = true; nroLicencia.disabled = false; categoria.disabled = false;
                codigo.disabled = true; codigo.value = ""; email.disabled = true; email.value = "";
            }
        }
    }
</script>