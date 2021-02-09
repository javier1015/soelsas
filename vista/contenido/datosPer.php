

<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-account-circle"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Actulizar mi informacion
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<?php
				session_start();
				@$tipoUser = $_SESSION['tipouser'];
				@$documento = $_SESSION['documento'];

		        $tipoUser = htmlspecialchars($tipoUser); 
		        $documento = htmlspecialchars($documento);
		        
					$url=1;
					require "../../controlador/usuarioControlador.php";
					$usuarioC = new UsuarioControlador();
					$registro = $usuarioC->datosUsuarioControlador("unico", $documento);
					if($registro->rowcount()==1){
						$campos = $registro->fetch();
						?>
						<div class="mdl-tabs__panel is-active">
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
									<div class="full-width panel mdl-shadow--2dp">
										<div class="full-width panel-tittle bg-primary text-center tittles">
											Datos personales
										</div>
										<div class="full-width panel-content">
											<form action="" method="POST" autocomplete="off" enctype="multipart/form-data"> 
												<div class="mdl-grid">
													<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
														<h5 class="text-condensedLight">Mis datos</h5>
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="number" readonly="readonly" disabled="disabled" pattern="-?[0-9]*(\.[0-9]+)?" id="doc" value="<?php echo $campos['docusuario1_fk']; ?>">
															<label class="mdl-textfield__label" for="docu">CC</label>
															<span class="mdl-textfield__error">Número invalido</span>
														</div>
													</div>	

													<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="nombre" value="<?php echo $campos['nombreUsuario']; ?>">
															<label class="mdl-textfield__label" for="nombreu">Nombre</label>
															<span class="mdl-textfield__error">Nombre invalido</span>
														</div>
													</div>

													<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="apellido" value="<?php echo $campos['apellidoUsuario']; ?>">
															<label class="mdl-textfield__label" for="apellidou">Apellido</label>
															<span class="mdl-textfield__error">Apellido invalido</span>
														</div>
													</div>

													<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="text" id="direccion" value="<?php echo $campos['direccionUsuario']; ?>">
															<label class="mdl-textfield__label" for="direccionu">Dirección</label>
															<span class="mdl-textfield__error">Dirección inválida</span>
														</div>

														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="tel" value="<?php echo $campos['telefonoUsuario']; ?>">
															<label class="mdl-textfield__label" for="telu">Teléfono</label>
															<span class="mdl-textfield__error">Numero de telefono invalido</span>
														</div>
													</div>
												</div>
												<p class="text-center">
													<a href="javascript:;" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" onclick="modificarDatos();">
														<i class="zmdi zmdi-plus"></i>
													</a>
													<div class="mdl-tooltip" for="agragarEmpleado">Agregar administradpr</div>
												</p>
												<div id="respuesta" class="text-center"></div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>						
	
						<?php	
					}else{
						echo "<h4>Lo sentimos</h4>
						<p>El administrador no exixte</p>";
					}
			?>
		</div>
</section>







