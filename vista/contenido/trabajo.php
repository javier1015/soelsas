<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class=" zmdi zmdi-file-text"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Lista de trabajos pendientes.
				</p>
			</div>
		</section><div class="mdl-tabs__panel is-active" id="tabListProducts">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Trabajos
							</div>
							
						<div class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
								<!-- <div class="panel-content">
									<form action="" method="POST" autocomplete="">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
											<label class="mdl-button mdl-js-button mdl-button--icon" for="buscarAdmin">
												<i class="zmdi zmdi-search"></i>
											</label>
											<div class="mdl-textfield__expandable-holder">
												<input class="" type="number" placeholder="Buscar Producto" onkeyup="listaProducto(this.value)">
												<label class="mdl-textfield__label"></label>
											</div>
										</div>
								
									</form>
								</div> -->
								<div id="respuesta" class="full-width text-center"></div>
								<table class="full-width">
									<thead>
											<tr>
											<th class="mdl-data-table__cell--non-numeric">Codigo</th>
											<th class="mdl-data-table__cell--non-numeric">Nombre</th>
											<th class="mdl-data-table__cell--non-numeric">Cantidad</th>
										</tr>
									</thead>  
									<tbody>
										<?php 
										require_once "../../controlador/trabajoControlador.php";
										$trabajoC = new TrabajoControlador();
										$trabajoC->listaTrabajosControlador();
										 ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>




