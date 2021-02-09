 <section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-book"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Detalles de la bitacora
				</p>
			</div>
		</section>
		<div class="mdl-tabs__panel is-active">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Bitacora
							</div>	
							<div class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
								<?php 
									if(isset($_GET['id'])){
										
										$id = $_GET['id'];
										require_once "../../core/modeloPrincipal.php";
										$modeloP = new ModeloPrincipal();
										$query = "SELECT * FROM bitacora WHERE docUsuario='$id'";
										$registro = $modeloP->consultaSimple($query);
										if($registro->rowcount()>=1){
								?>
											<div id="respuesta" class="full-width text-center"></div>
												<table class="full-width">
													<thead>
														<tr>
															<th class="mdl-data-table__cell--non-numeric">Fecha inicio</th>
															<th class="mdl-data-table__cell--non-numeric">Hora inicio</th>
															<th class="mdl-data-table__cell--non-numeric">Fecha cierre</th>
															<th class="mdl-data-table__cell--non-numeric">Hora cierre</th>
														</tr>
													</thead>
													<tbody>
														<?php 
														foreach ($registro as $value) {
														 ?>
														<tr>
															<td class="mdl-data-table__cell--non-numeric"><?php echo @$value[2]; ?></td>
															<td class="mdl-data-table__cell--non-numeric"><?php echo @$value[4]; ?></td>
															<td class="mdl-data-table__cell--non-numeric"><?php echo @$value[3]; ?></td>
															<td class="mdl-data-table__cell--non-numeric"><?php echo @$value[5]; ?></td>
															
														</tr>
														<?php
															}
														 ?>
													</tbody>
											</table>
								<?php						
										}else{
											echo "<div class='text-center alert alert-warning'>El usuario seleccionado no ha realizado ningun ingreso.</div>";
										}
								
									}else{
										echo "<div class='text-center alert alert-warning'>No se selecciono ningun registro.</div>";
									}
								 ?>
								
								<button onclick="cargarVista('con','contenido/registro.php');" class="full-width bg-primary" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-arrow-left"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>








	















		








