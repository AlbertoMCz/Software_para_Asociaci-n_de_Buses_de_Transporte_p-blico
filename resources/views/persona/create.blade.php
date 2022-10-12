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
											<select class="col-md-6 col-sm-6 " id="genero" name="genero" required>
												<option value="">Seleccionar género</option>
												<option value="M">Masculino</option>
												<option value="F">Femenino</option>
											</select>
										</div>


										<div class="item form-group">
											<div class="col-md-6 col-sm-6 ">
												<div class="checkbox">
													<label>
														<input type="checkbox" id="Socio" onchange="toggle()" onclick="uncheck()" name="Socio" value="S" checked>
													Socio</label>
												</div>

												<div class="item form-group">
													<label class="col-form-label col-md-2 col-sm-2 label-align" for="codigo">Código <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6 ">
														<input type="text" id="codigo" name="codigo" onfocus="protegeCampo(this)" class="form-control ">
													</div>
												</div>
												<div class="item form-group">
													<label class="col-form-label col-md-2 col-sm-2 label-align" for="email">Email <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6 ">
														<input type="text" id="email" name="email" onfocus="protegeCampo(this)" class="form-control ">
													</div>
												</div>
											</div>

											<div class="col-md-6 col-sm-6 ">
												<div class="checkbox">
													<label>
														<input type="checkbox" id="Chofer" onchange="toggle2()" onclick="uncheck()" name="Chofer" value="C">
													Chofer</label>
												</div>

												<div class="item form-group">
													<label class="col-form-label col-md-2 col-sm-2 label-align" for="nroLicencia">Nro. de licencia <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6 ">
														<input type="text" id="nroLicencia" name="nroLicencia" onfocus="bloquearCamposChofer(this)"  class="form-control ">
													</div>
												</div>
												<div class="item form-group">
													<label class="col-form-label col-md-2 col-sm-2 label-align" for="categoria">Categoría <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6 ">
														<input type="text" id="categoria" name="categoria" onfocus="bloquearCamposChofer(this)"  class="form-control ">
													</div>
												</div>
												<div class="item form-group">
													<label class="col-form-label col-md-2 col-sm-2 label-align" for="categoria">Disponible <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6 ">
														<select class="col-md-6 col-sm-6 " id="disponible" name="disponible" onfocus="bloquearCamposChofer(this)" required>
															<option value="SI">SI</option>
															<option value="NO">NO</option>
														</select>
													</div>
												</div>

											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-success">Enviar</button>
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
    proteger=false;
    function protegeCampo(cmp){
        if (proteger) cmp.blur();
    }
    function toggle(){
        if (proteger) proteger=false; else proteger=true;
    }
    bloquear=false;
    function bloquearCamposChofer(cmp){
        if (bloquear) cmp.blur();
    }
    function toggle2(){
        if (bloquear) bloquear=false; else bloquear=true;
    }

    //Seleccionar un solo checkbox
    function uncheck(){
        var checkbox1 = document.getElementById("Socio");
        var checkbox2 = document.getElementById("Chofer");
        checkbox1.onclick = function(){
            if(checkbox1.checked != false){
                checkbox2.checked =null; }
        }
        checkbox2.onclick = function(){
            if(checkbox2.checked != false){
                checkbox1.checked=null;
            }
        }
    }

</script>