 <section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-money"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aut nulla accusantium minus corporis accusamus fuga harum natus molestias necessitatibus.
				</p>
			</div>
		</section>
		<div class="mdl-tabs__panel is-active" id="tabListProducts">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Lista de Productos
							</div>
							<div class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
								<div class="panel-content">
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
								</div>
								<div id="respuesta" class="full-width text-center"></div>
								<table class="full-width">
									<thead>
										<tr>
											<th class="mdl-data-table__cell--non-numeric">Trabajo</th>
											<th class="mdl-data-table__cell--non-numeric">Precio</th>
											<th class="mdl-data-table__cell--non-numeric">Cantidad</th>
											<th class="mdl-data-table__cell--non-numeric">Fecha</th>
											<th class="mdl-data-table__cell--non-numeric">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="mdl-data-table__cell--non-numeric">efiujiv</td>
											<td class="mdl-data-table__cell--non-numeric">25</td>
											<td class="mdl-data-table__cell--non-numeric">1000</td>
											<td class="mdl-data-table__cell--non-numeric">22/04/2019</td>
											<td class="mdl-data-table__cell--non-numeric">648343</td>
										</tr>
										<tr>
											<td class="mdl-data-table__cell--non-numeric">fkfvfvfv</td>
											<td class="mdl-data-table__cell--non-numeric">15</td>
											<td class="mdl-data-table__cell--non-numeric">20</td>
											<td class="mdl-data-table__cell--non-numeric">21/04/2019</td>
											<td class="mdl-data-table__cell--non-numeric">111122</td>
										</tr>
										<tr>
											<td class="mdl-data-table__cell--non-numeric">fvjvmkrv</td>
											<td class="mdl-data-table__cell--non-numeric">500</td>
											<td class="mdl-data-table__cell--non-numeric">30</td>
											<td class="mdl-data-table__cell--non-numeric">21/04/2019</td>
											<td class="mdl-data-table__cell--non-numeric">789003</td>
										</tr>
									</tbody>
								</table>
								<button onclick="cargarVista('con','contenido/pago.php');" class="full-width" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-arrow-left"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
