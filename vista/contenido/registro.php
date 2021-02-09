pageContent -->
<section class="full-width pageContent">
	<section class="full-width text-center" style="padding: 80px 0;">
		<h3 class="text-center tittles">Azulejos</h3>
		<!-- Tiles -->
		<?php 
			require_once "../../core/modeloPrincipal.php";
			$modeloP = new ModeloPrincipal();
			$query = "SELECT * FROM usuario";
			$registro = $modeloP->consultaSimple($query);
			if($registro->rowcount()>=1){
				foreach ($registro as $value){
		?>
					<article class="full-width tile">
						<div class="tile-text">
							<span class="text-condensedLight">
								<label class="" for="">
									<small><?php echo $value[0]; ?></small>
								</label><br>
								<label class="" for="">
									<small><?php echo $value[1]; ?></small>
								</label><br>
								<label class="" for="">
									<small>ADM</small>
								</label>
							</span>
						</div>
						<button onclick="cargarVista('con','contenido/historial.php?id=<?php echo $value[0] ?>');" class="full-width" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-plus tile-icon"></i></button>
					</article>
		<?php	
				}	
			}else{
				echo "<div class='alert alert-warning'>No hay usuarios registrados</div>";
			}

		 ?>
	</section>
</section>


<!-- 

Parse error: syntax error, unexpected 'as' (T_AS), expecting ';' in C:\xampp\htdocs\vis\vista\contenido\registro.php on line 12
