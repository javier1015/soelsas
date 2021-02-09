 <section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-store"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Lista de movimientos.
				</p>
			</div>
		</section>
		<div class="mdl-tabs__panel is-active" id="tabListProducts">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Detalles de Movimiento
							</div>
							
						<div class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
								<div id="respuesta" class="full-width text-center"></div>
								<table class="full-width">
									<thead>
										<tr>
											<th class="mdl-data-table__cell--non-numeric">Producto</th>
											<th class="mdl-data-table__cell--non-numeric">Nombre</th>
											<th class="mdl-data-table__cell--non-numeric">Cantidad</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											require_once "../../controlador/inventarioControlador.php";
											$idMovimiento = $_GET['id'];
											$inventarioC = new InventarioControlador();
											$datos = $inventarioC->detalleMovimientoControlador($idMovimiento);
											foreach ($datos as $value) {
												echo '<tr>
														<td class="mdl-data-table__cell--non-numeric">'.$value[0].'</td>
														<td class="mdl-data-table__cell--non-numeric">'.$value[1].'</td>
														<td class="mdl-data-table__cell--non-numeric">'.$value[2].'</td>
													</tr>';		
											}

										 ?>
									</tbody>
								</table>
								<button onclick="cargarVista('con','contenido/inventario.php');"class="full-width bg-primary" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-arrow-left"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>







		



















































