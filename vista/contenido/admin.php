<section class="full-width pageContent">
	<section class="full-width header-well">
		<div class="full-width header-well-icon">
			<i class="zmdi zmdi-account"></i>
		</div>
		<div class="full-width header-well-text">
			<p class="text-condensedLight">
				Gestion de empleados.
			</p>
		</div>
	</section>
	<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		<div class="mdl-tabs__tab-bar">
			<a href="#nuevoEmpleado" class="mdl-tabs__tab is-active">NUEVO</a>
			<a href="javascript:;" onclick="cargarVista('con','contenido/adminList.php');" class="mdl-tabs__tab">LISTA</a>
		</div>
		<div class="mdl-tabs__panel is-active" id="nuevoEmpleado">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
					<div class="full-width panel mdl-shadow--2dp">
						<div class="full-width panel-tittle bg-primary text-center tittles">
							Nuevo empleado
						</div>
						<div class="full-width panel-content">
							<div id="respuestaFomulario" class="text-center"></div>
							<form action="" method="POST" autocomplete="off" enctype="multipart/form-data"> 
								<div class="mdl-grid">
									<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
										<h5 class="text-condensedLight">Datos personales</h5>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<select class="mdl-textfield__input"pattern="-?[0-9]*(\.[0-9]+)?" id="tipodoc" name="tipodoc">
												<?php 
													require_once "../../core/modeloPrincipal.php";
													$mp = new ModeloPrincipal();
													$mp->listaTipoDoc();
												 ?>
											</select>
										</div>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="documentoUsuario" name="documentoUsuario">
											<label class="mdl-textfield__label" for="documentoUsuario">CC</label>
										</div>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-zÃƒÂ¡ÃƒÂ©ÃƒÂ­ÃƒÂ³ÃƒÂºÃƒÂÃƒâ€°ÃƒÂÃƒâ€œÃƒÅ¡ ]*(\.[0-9]+)?" id="nombreUsuario" name="nombreUsuario">
											<label class="mdl-textfield__label" for="nombreUsuario">Nombre</label>
										</div>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-zÃƒÂ¡ÃƒÂ©ÃƒÂ­ÃƒÂ³ÃƒÂºÃƒÂÃƒâ€°ÃƒÂÃƒâ€œÃƒÅ¡ ]*(\.[0-9]+)?" id="apellidoUsuario" name="apellidoUsuario">
											<label class="mdl-textfield__label" for="apellidoUsuario">Apellido</label>
										</div>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-zÃƒÂ¡ÃƒÂ©ÃƒÂ­ÃƒÂ³ÃƒÂºÃƒÂÃƒâ€°ÃƒÂÃƒâ€œÃƒÅ¡ ]*(\.[0-9]+)?" id="direccionUsuario" name="direccionUsuario">
											<label class="mdl-textfield__label" for="direccionUsuario">Direccion</label>
										</div>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="tel" id="telefonoUsuario" name="telefonoUsuario">
											<label class="mdl-textfield__label" for="telefonoUsuario">Telefono</label>
										</div>
									</div>
									<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
										<h5 class="text-condensedLight">Detalles de cuanta</h5>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9ÃƒÂ¡ÃƒÂ©ÃƒÂ­ÃƒÂ³ÃƒÂºÃƒÂÃƒâ€°ÃƒÂÃƒâ€œÃƒÅ¡]*(\.[0-9]+)?" id="nombreUser" name="nombreUser">
											<label class="mdl-textfield__label" for="nombreUser">Nombre usuario</label>
										</div>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="password" id="clave1" name="clave1">
											<label class="mdl-textfield__label" for="clave1">Contraseña</label>
										</div>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="password" id="clave2" name="clave2">
											<label class="mdl-textfield__label" for="clave2">Confirmar contraseña</label>
										</div>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<select class="mdl-textfield__input"pattern="-?[0-9]*(\.[0-9]+)?" id="rol" name="rol">
												<?php 
													$mp->listaRol();
												 ?>
											</select>
										</div>
									</div>
								</div>
								<p class="text-center">
									<a href="javascript:;" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" onclick="registraUsuario()">
										<i class="zmdi zmdi-plus"></i>
									</a>
									<div class="mdl-tooltip" for="agragarEmpleado">Agregar personal</div>
								</p>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

