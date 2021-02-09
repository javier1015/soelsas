<section class="full-width pageContent" onplay="registraMovimiento('')">
	<section class="full-width header-well">
		<div class="full-width header-well-icon">
			<i class="zmdi zmdi-truck"></i>
		</div>
		<div class="full-width header-well-text">
			<p class="text-condensedLight">
				gestion de movimientos
			</p>
		</div>
	</section>
	<div class="full-width divider-menu-h"></div>
	<div class="mdl-tabs__panel is-active">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
					<div class="full-width panel mdl-shadow--2dp">
						<div class="full-width panel-tittle bg-primary text-center tittles">
							Nuevo Movimiento
						</div>
						<div class="full-width panel-content">
							<div id="respuestaFomulario" class="text-center"></div>
							<input type="text" hidden="" id="cod" name="cod" value="">
								<div class="mdl-grid">
									<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
										<h5 class="text-condensedLight">Datos del Movimiento</h5>
										<form autocomplete="off">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											
												<select class="mdl-textfield__input"pattern="-?[0-9]*(\.[0-9]+)?" id="tipo" name="tipo" required="on">
														<?php 
															require_once "../../core/modeloPrincipal.php";
															$modeloP = new ModeloPrincipal();
															$modeloP->listaTipoMovimiento();
														 ?>
													</select>
											</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="codPT" required="on">
												<label class="mdl-textfield__label" for="Codigo">Codigo</label>
												<span class="mdl-textfield__error">Codigo invalido</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="cantidad" required="on">
												<label class="mdl-textfield__label" for="cantidad">Cantidad</label>
												<span class="mdl-textfield__error">Cantidad invalido</span>
											</div>
											<br>
											<a class="btn btn-primary" onclick="registraMovimiento('')">Agregar</a>
											<!-- <a href="javascript:;" class="btn btn-primary" onclick="listaDetaMovimiento()">Ver</a> -->
										</form>	
									</div>
									<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop" id="tabla">
										<h5 class="text-condensedLight">detalles del movimiento</h5>
										<!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<label class="mdl-textfield__label" for="NumMovi">Numero del Movimiento</label>
										</div>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<label class="mdl-textfield__label" for="NomPro"> Nombre del Producto </label>
										</div> -->

										<table class="full-width table table-hover table-condensed">
											<thead>
												<tr>
													<th class="mdl-data-table__cell--non-numeric">PT</th>
													<th class="mdl-data-table__cell--non-numeric">Cantidad</th>
													<th class="mdl-data-table__cell--non-numeric">Editar</th>
													<th class="mdl-data-table__cell--non-numeric">Eliminar</th>
												</tr>
											</thead>
										    <tbody id="lista">
											</tbody>
										</table>

									</div>
								</div>
								<p class="text-center" id="btnConfirmar" >
									<button class="btn btn-primary" onclick="registraMovimiento('v')">Confirmar</button>
									<div class="mdl-tooltip" for="btn-Movi">Confirmar</div>
								</p>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>