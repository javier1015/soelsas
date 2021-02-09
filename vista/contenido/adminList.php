

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
			<a href="javascript:;" onclick="cargarVista('con','contenido/admin.php');" class="mdl-tabs__tab is-active">NUEVO</a>
			<a href="#listaEmpleado" class="mdl-tabs__tab" onclick="listaUsuario('');">LISTA</a>
		</div>
		<div class="mdl-tabs__panel" id="listaEmpleado">
			<div class="mdl-grid">
				<div class="mdl-shadow--2dp full-width">
					<div class="full-width panel-tittle bg-success text-center tittles">
						Lista personal
					</div>
					<div class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
						<div class="panel-content">
							<form action="" method="POST" autocomplete="">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
									<label class="mdl-button mdl-js-button mdl-button--icon" for="buscarAdmin">
										<i class="zmdi zmdi-search"></i>
									</label>
									<div class="mdl-textfield__expandable-holder">
										<input class="" type="number" placeholder="Documento" onkeyup="listaUsuario(this.value)">
										<label class="mdl-textfield__label"></label>
									</div>
								</div>
						
							</form>
						</div>
						<div id="respuesta" class="full-width text-center"></div>
						<table class="full-width">
							<thead>
								<tr>
									<th class="mdl-data-table__cell--non-numeric">Documento</th>
									<th class="mdl-data-table__cell--non-numeric">Nombre</th>
									<th class="mdl-data-table__cell--non-numeric">Apellido</th>
									<th class="mdl-data-table__cell--non-numeric">direccion</th>
									<th class="mdl-data-table__cell--non-numeric">telefono</th>
									<th class="mdl-data-table__cell--non-numeric">Fecha Registro</th>
									<th class="mdl-data-table__cell--non-numeric">ROL</th>
									<th class="mdl-data-table__cell--non-numeric">Actualizar</th>
					    			<th class="mdl-data-table__cell--non-numeric">Eliminar</th>
								</tr>
							</thead>
						    <tbody id="lista">
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
	</div>
</section>

