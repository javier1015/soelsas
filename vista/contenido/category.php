<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-label"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					gestion de Categorias.
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="javascript:;"onclick="cargarVista('con','contenido/category.php');" class="mdl-tabs__tab is-active">NUEVO</a>
				<a href="javascript:;"onclick="cargarVista('con','contenido/categorylis.php'); listaCategoria('')" class="mdl-tabs__tab">LISTA</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewCate">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nueva Categoria
							</div>
							<div class="full-width panel-content">
								<div id="respuestaFomulario" class="text-center"></div>
								<form action="../controlador/categoriaControlador.php" method="POST" autocomplete="off" onsubmit="enviarFormulario(event)">
									<h5 class="text-condensedLight">Datos de categoría</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" required="" id="NomCate" name="NomCate">
										<label class="mdl-textfield__label" for="NomCate">Nombre</label>
										<span class="mdl-textfield__error">Nombre inválido</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="DEsCate" name="DEsCate">
										<label class="mdl-textfield__label" for="DEsCate">Descripción</label>
										<span class="mdl-textfield__error">Descripción inválida</span>
									</div>
									<p class="text-center">
									<a href="javascript:;" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" onclick="registraCategoria()">
										<i class="zmdi zmdi-plus"></i>
									</a>
									<div class="mdl-tooltip" for="agragarEmpleado">Agregar administradpr</div>
								</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>









