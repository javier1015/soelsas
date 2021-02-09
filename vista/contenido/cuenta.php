


<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-account-calendar"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Actulizar mis datos de la cuenta
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<?php 
			session_start();
			@$usuario = $_SESSION['nameuser'];
			@$documento = $_SESSION['documento'];

			$usuario = htmlspecialchars($usuario);
			$documento = htmlspecialchars($documento);
			 ?>
			<div class="mdl-tabs__panel is-active">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Datos de Usuario
							</div>
							<div class="full-width panel-content">
								<div id="respuestaForm" class="text-center"></div>
								<form>
									<h5 class="text-condensedLight">Usuario </h5>
									<input type="text" hidden="" id="doc" value="<?php echo $documento; ?>">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="nameUser" value="<?php echo $usuario; ?>">
										<label class="mdl-textfield__label" for="NomUsua">Usuario</label>
										<span class="mdl-textfield__error">Usuario inválido</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="password" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Clave">
										<label class="mdl-textfield__label" for="Clave">Clave Actual</label>
										<span class="mdl-textfield__error">Clave inválida</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="password" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NewClave">
										<label class="mdl-textfield__label" for="NuClave">Nueva Clave</label>
										<span class="mdl-textfield__error">Clave inválida</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="password" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="VerifClave">
										<label class="mdl-textfield__label" for="NuClave">Confirmar clave</label>
										<span class="mdl-textfield__error">Clave inválida</span>
									</div>
									<p class="text-center">
										<a href="javascript:;" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-Cuenta" onclick="actualizarCuenta();">
											<i class="zmdi zmdi-plus"></i>
										</a>
										<div class="mdl-tooltip" for="btn-Cuenta">Añadir</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>



