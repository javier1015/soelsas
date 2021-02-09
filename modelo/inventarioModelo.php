<?php 
	/**
	 * 
	 */
	if(@$_GET['peticion']=="1"){
		require_once "../../core/modeloPrincipal.php";

	}else{

		require_once "../core/modeloPrincipal.php";
	}
	class InventarioModelo extends ModeloPrincipal{
		
		protected function listaModelo($tipo, $id){
			if($tipo=="unico"){
				$query = "SELECT m.contadorMovimiento, t.nombreTipoMovimiento, m.fechaMovi FROM tipomovimiento t, movimiento m WHERE t.idTipoMovimiento = m.idtipoMovimiento AND m.contadorMovimiento = $id


				";

				$sql = ModeloPrincipal::conectardb()->prepare($query);
			}elseif ($tipo=="general") {
				$query = "SELECT m.contadorMovimiento, t.nombreTipoMovimiento, m.fechaMovi, m.idmovimiento FROM tipomovimiento t, movimiento m WHERE t.idTipoMovimiento = m.idtipoMovimiento
				";
				$sql = ModeloPrincipal::conectardb()->prepare($query);
				
			}
			$sql->execute();
			return $sql;
		}
		

		protected function detalleMovimientoModelo($id){
			$query = "SELECT d.idProducto,p.nombreProducto,d.cantidad 
				FROM movimiento m INNER JOIN detallemovimiento d on m.idmovimiento = d.idmovimiento_fk 
				INNER JOIN producto p on p.idProducto = d.idProducto 
				WHERE m.idmovimiento = :idmovimiento
			";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":idmovimiento", $id);
			$sql->execute();
			return $sql; 
		}

	}