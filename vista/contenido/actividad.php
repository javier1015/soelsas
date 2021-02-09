
<section class="full-width pageContent">
	<section class="full-width header-well">
		<div class="full-width header-well-icon">
			<i class="zmdi zmdi-wrench"></i>
		</div>
		<div class="full-width header-well-text">
			<p class="text-condensedLight">
				gestion de Actividades.
			</p>
		</div>
	</section>
	<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		<div class="mdl-tabs__tab-bar">
			<a href="javascript:;"onclick="cargarVista('con','contenido/actividad.php');" class="mdl-tabs__tab is-active">NUEVO</a>
			<a href="javascript:;"onclick="cargarVista('con','contenido/actividadlis.php');listaActividad('');" class="mdl-tabs__tab">LISTA</a>
		</div>
		<div class="mdl-tabs__panel is-active" id="tabNewActi">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nueva Actividad
							</div>
							<div class="full-width panel-content">
								<div id="respuestaFomulario" class="text-center"></div>
								<form>
									<h5 class="text-condensedLight">Datos del Trabajo</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NomActi">
										<label class="mdl-textfield__label" for="NomActi">Nombre</label>
										<span class="mdl-textfield__error">Nombre inválido</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Precio">
										<label class="mdl-textfield__label" for="Precio">Precio</label>
										<span class="mdl-textfield__error">Precio inválida</span>
									</div>
									<p class="text-center">
									<a href="javascript:;" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" onclick="registraActividad()">
										<i class="zmdi zmdi-plus"></i>
									</a>
									<div class="mdl-tooltip" for="agragarEmpleado">Agregar actividad</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</section>


