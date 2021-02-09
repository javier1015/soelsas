<?php 

/**
 * 
 */
	

	if(@$urlM==1){
		require_once "../../core/modeloPrincipal.php";
	}else{
		require_once "../core/modeloPrincipal.php";
	}
class MovimientoModelo extends ModeloPrincipal{

	protected function registraMovimientoModelo($datos){
		$query = "INSERT INTO movimiento (idmovimiento, idtipoMovimiento, docusuario5_fk, estadoMovimiento, contadorMovimiento) VALUES (:idmovimiento, :idTipoM, :docUsuario, :estadoMovimiento, :contadorM)";
		$sql = ModeloPrincipal::conectardb()->prepare($query);
		$sql->bindParam(":idmovimiento", $datos['idmovimiento']);
		$sql->bindParam(":idTipoM", $datos['idTipoM']);
		$sql->bindParam(":docUsuario", $datos['docUsuario']);
		$sql->bindParam(":estadoMovimiento", $datos['estadoMovimiento']);
		$sql->bindParam(":contadorM", $datos['contadorM']);
		$sql->execute();
		return $sql;
	}

	protected function registraDetalleMovimientoModelo($datos){
		$query = "INSERT INTO detallemovimiento(idmovimiento_fk, cantidad, idProducto) VALUES (:idMovimiento, :cantidad, :idProducto)";
		$sql = ModeloPrincipal::conectardb()->prepare($query);
		$sql->bindParam(":idMovimiento", $datos['idMovimiento']);
		$sql->bindParam(":cantidad", $datos['cantidad']);
		$sql->bindParam(":idProducto", $datos['idpt']);
		$sql->execute();
		return $sql;
	}

	//Eliminar datos de la tabla detallemovimiento
	protected function eliminaDetaMovimientoModelo($id){
		$query = "DELETE FROM detallemovimiento WHERE idDetalleMovimiento = :idmovimiento";
		$sql = ModeloPrincipal::conectardb()->prepare($query);
		$sql->bindParam(":idmovimiento", $id);
		$sql->execute();
		return $sql;
	}
	
	//Eliminar datos de la tabla movimiento
	protected function eliminaMovimientoModelo($id){
		$query = "DELETE FROM movimiento WHERE idmovimiento = :idmovimiento ";
		$sql = ModeloPrincipal::conectardb()->prepare($query);
		$sql->bindParam(":idmovimiento", $id);
		$sql->execute();
		return $sql;
	}


	protected function actualizaMovimientoModelo($datos){
		$query = "UPDATE detallemovimiento SET idProducto=:idpt, cantidad=:cantidad WHERE idDetalleMovimiento = :idmovimiento";
		$sql = ModeloPrincipal::conectardb()->prepare($query);
		$sql->bindParam(":idpt", $datos['idpt']);
		$sql->bindParam(":cantidad", $datos['cantidad']);
		$sql->bindParam(":idmovimiento", $datos['idmovimiento']);
		$sql->execute();
		return $sql;
	}

	//Funcion para contar 
		protected function datosCategoriaModelo($tipo, $id){
			if($tipo=="conteo"){
				$query = "SELECT idmovimiento FROM movimiento";
				$sql = ModeloPrincipal::conectardb()->prepare($query);
			}
			$sql->execute();
			return $sql;
		}

}