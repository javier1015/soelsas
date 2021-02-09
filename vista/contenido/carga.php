 <section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-cloud-upload"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Trabajos Realizados
				</p>
			</div>
		</section>
		
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
					<div class="full-width panel mdl-shadow--2dp">
						<div class="full-width panel-tittle bg-primary text-center tittles">
							Nuevo Movimiento
						</div>
						<div class="full-width panel-content">
							<div id="respuestaFomulario" class="text-center"></div>
							<form>
								<h5 class="text-condensedLight">Pagos</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<select class="mdl-textfield__input" id="usuario">
										<?php 
											require_once "../../core/modeloPrincipal.php";
											$mp = new ModeloPrincipal();
											$mp->listaCargaTrabajo();
										 ?>
										</select>
									</div>
                                    <div class="mdl-textfield mdl-js-textfield">
                                    	<select class="mdl-textfield__input" id="actividad">
										<?php 
													require_once "../../core/modeloPrincipal.php";
													$mp = new ModeloPrincipal();
													$mp->listaActividad();
												 ?>
										</select>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="cantidad">
										<label class="mdl-textfield__label" for="Cantidad">Cantidad</label>
									</div>
									<p class="text-center">
										<a href="javascript:;" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-Carga" onclick="registraPago()">
											<i class="zmdi zmdi-plus"></i>
										</a>
										<div class="mdl-tooltip" for="btn-Carga">Añadir</div>
									</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

