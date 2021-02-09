<!-- pageContent -->
<section class="full-width pageContent">
	<section class="full-width text-center" style="padding: 40px 0;">
		<h3 class="text-center tittles">Azulejos receptivos</h3>
		<?php 	print("putas"); ?>
		<!-- Tiles -->
		<?php
			$urlA=1;
			require "../../controlador/actividadControlador.php";
			$actC = new ActividadControlador();
			$contActi = $actC->datosActiControlador("conteo", 0);  
		 ?>
		<article class="full-width tile">
			<div class="tile-text">
				<span class="text-condensedLight">
					<?php echo $contActi->rowcount(); ?>
					<br>
					<small>Actividades</small>
				</span>
			</div>
			<i class="zmdi zmdi-wrench tile-icon"></i>
		</article>
		<!-- Ejecutar funcion para contar personal registrado -->
		<?php
			$url=1;
			require "../../controlador/usuarioControlador.php";
			$usuarioC = new UsuarioControlador();
			$contEmpleado = $usuarioC->datosUsuarioControlador("conteo", 0);  
		 ?>
		<article class="full-width tile">
			<div class="tile-text">
				<span class="text-condensedLight">
					<!-- imprimiendo contador de persosal -->
					<?php echo $contEmpleado->rowcount(); ?>
					<br>
					<small>Personal</small>
				</span>
			</div>
			<i class="zmdi zmdi-accounts tile-icon"></i>
		</article>
		<?php
			$urlM=1;
			require "../../controlador/MovimientoControlador.php";
			$moviC = new MovimientoControlador();
			$contMovi = $moviC->datosMoviControlador("conteo", 0);  
		 ?>
		<article class="full-width tile">
			<div class="tile-text">
				<span class="text-condensedLight">
					<?php echo $contMovi->rowcount(); ?>
					<br>
					<small>Movimientos</small>
				</span>
			</div>
			<i class="zmdi zmdi-truck tile-icon"></i>
		</article>
		 <!-- Ejecutar funcion para contar categoria registrado -->
		<?php
			$urlC=1;
			require "../../controlador/categoriaControlador.php";
			$categoriaC = new categoriaControlador();
			$contCategoria = $categoriaC->datosCategoriaControlador("conteo", 0);  
		 ?>
		<article class="full-width tile">
			<div class="tile-text">
				<span class="text-condensedLight">
					<?php echo $contCategoria->rowcount(); ?>
					<br>
					<small>Categorias</small>
				</span>
			</div>
			<i class="zmdi zmdi-label tile-icon"></i>
		</article>
		 <!-- Ejecutar funcion para contar productos registrado -->
		<?php
			$urlp=1;
			require "../../controlador/productoControlador.php";
			$productoC = new productoControlador();
			$contProducto = $productoC->datosProductoControlador("conteo", 0);  
		 ?>
		<article class="full-width tile">
			<div class="tile-text">
				<span class="text-condensedLight">
					<?php echo $contProducto->rowcount(); ?>
					<br>
					<small>Productos</small>
				</span>
			</div>
			<i class="zmdi zmdi-washing-machine tile-icon"></i>
		</article>
		<article class="full-width tile">
			<div class="tile-text">
				<span class="text-condensedLight">
					0<br>
					<small>Pagos</small>
				</span>
			</div>
			<i class="zmdi zmdi-money tile-icon"></i>
		</article>
	</section>
</section>