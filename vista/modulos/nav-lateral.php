 <!-- navLateral -->
<section class="full-width navLateral">
	<div class="full-width navLateral-bg btn-menu"></div>
	<div class="full-width navLateral-body">
		<div class="full-width navLateral-body-logo text-center tittles">
			<i class="zmdi zmdi-close btn-menu"></i> SOEL S.A.S 
		</div>
		<figure class="full-width" style="height: 77px;">
			<div class="navLateral-body-cl">
				<img src="./assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
			</div>
			<figcaption class="navLateral-body-cr hide-on-tablet">
				<span>
					<?php echo $_SESSION['user']; ?><br>
					<small>Administrador</small>
				</span>
			</figcaption>
		</figure>
		<div class="full-width tittles navLateral-body-tittle-menu">
			<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp;Menú</span>
		</div>
		<nav class="full-width">
			<ul class="full-width list-unstyle menu-principal">
				<li class="full-width">
					<a href="javascript:;" onclick="cargarVista('con','contenido/home.php');" class="full-width">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-view-dashboard"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							HOME
						</div>
					</a>
				</li>
				<li class="full-width divider-menu-h"></li>
				<li class="full-width">
					<a href="#!" class="full-width btn-subMenu">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-case"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							ADMINISTRADOR 
						</div>
						<span class="zmdi zmdi-chevron-left"></span>
					</a>
					<ul class="full-width menu-principal sub-menu-options">
						<li class="full-width">
							<a href="javascript:;" onclick="cargarVista('con','contenido/trabajo.php');" class="full-width">

								<div class="navLateral-body-cl">
										<i class=" zmdi zmdi-file-text"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									TRABAJOS
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="javascript:;" onclick="cargarVista('con','contenido/Movimientos.php');" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-truck"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									MOVIMIENTOS
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="javascript:;" onclick="cargarVista('con','contenido/inventario.php')" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-store"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">INVENTARIO
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="javascript:;" onclick="cargarVista('con','contenido/category.php');" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-label"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">CATEGORIAS
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="javascript:;" onclick="cargarVista('con','contenido/producto.php');" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-washing-machine"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">PRODUCTOS
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="javascript:;" onclick="cargarVista('con','contenido/actividad.php');" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-wrench"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">ACTIVIDADES
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="javascript:;" onclick="cargarVista('con','contenido/admin.php');" class="full-width">

								<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
								<div class="navLateral-body-cr hide-on-tablet">
									PERSONAL
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="javascript:;" onclick="cargarVista('con','contenido/registro.php');" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-book"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">HISTORIAL
								</div>
							</a>
						</li>
					</ul>
                    <li class="full-width divider-menu-h"></li>
				<li class="full-width">
					<a href="#!" class="full-width btn-subMenu">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-card"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							NOMINA
						</div>
						<span class="zmdi zmdi-chevron-left"></span>
					</a>
					<ul class="full-width menu-principal sub-menu-options">
						<li class="full-width">
							<a href="javascript:;" onclick="cargarVista('con','contenido/carga.php');" class="full-width">

								<div class="navLateral-body-cl">
										<i class="zmdi zmdi-cloud-upload"></i>
									</div>
								<div class="navLateral-body-cr hide-on-tablet">
									CARGA DE TRABAJOS
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="javascript:;" onclick="cargarVista('con','contenido/pago.php');" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-money"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
										PAGOS
								</div>
							</a>
						</li>
					</ul>
				<li class="full-width divider-menu-h"></li>
				<li class="full-width">
					<a href="#!" class="full-width btn-subMenu">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-settings"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							AJUSTES
						</div>
						<span class="zmdi zmdi-chevron-left"></span>
					</a>
					<ul class="full-width menu-principal sub-menu-options">
						<li class="full-width">
							<a href="javascript:;" onclick="cargarVista('con','contenido/cuenta.php');" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-account-calendar"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									CUENTA
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="javascript:;" onclick="cargarVista('con','contenido/datosPer.php');" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-account-circle"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									DATOS PERSONALES
								</div>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</section>