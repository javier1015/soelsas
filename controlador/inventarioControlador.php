<?php 
	/**
	 * 
	 */
	if(@$_GET['peticion']=="1"){
		require_once "../../modelo/inventarioModelo.php";	
	}else{
		require_once "../modelo/inventarioModelo.php";
	}
	class InventarioControlador extends InventarioModelo{
		
		public function listaControlador($tipo, $id){
			$registro = InventarioModelo::listaModelo($tipo, $id);
			foreach ($registro as $value) {
			echo '<tr>
						<td class="mdl-data-table__cell--non-numeric">'.$value[0].'</td>
						<td class="mdl-data-table__cell--non-numeric">'.$value[1].'</td>
						<td class="mdl-data-table__cell--non-numeric">'.$value[2].'</td>
				';
			?>			
				 
						<td><button onclick="cargarVista('con','contenido/detaMovi.php?id=<?php echo $value[3] ?>&peticion=1');" class="full-width" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
			   		</tr>
		<?php } 

		}

		public function detalleMovimientoControlador($id){
			return InventarioModelo::detalleMovimientoModelo($id);
		}



	}

