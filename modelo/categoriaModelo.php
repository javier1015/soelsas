<?php  
	/**
	 * 
	 */
	if(@$urlC==1){
		require_once "../../core/modeloPrincipal.php";
	}else{
		require_once "../core/modeloPrincipal.php";
	}
	class CategoriaModelo extends ModeloPrincipal{
		
		protected function registraCategoriaModelo($datos){
			$query = "INSERT INTO categoria (nombreCategoria, descripcionCategoria)VALUES(:nombre, :descripcion)";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":nombre", $datos['nombre']);
			$sql->bindParam(":descripcion", $datos['descripcion']);
			$sql->execute();
			return $sql;
		}


		protected function actualizaDatosCategoriaModelo($datos){
			$query = "UPDATE categoria SET nombreCategoria=:nom, descripcionCategoria=:des WHERE idCategoria=:id";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":id", $datos['id']);
			$sql->bindParam(":nom", $datos['nom']);
			$sql->bindParam(":des", $datos['des']);	
			$sql->execute();
			return $sql;
		}

		protected function eliminaDatosCategoriaModelo($id){
			$query = "CALL update_category(:id)";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":id", $id);
			$sql->execute();
			return $sql;
		}

		//Funcion para contar categoria
		protected function datosCategoriaModelo($tipo, $id){
			if($tipo=="conteo"){
				$query = "SELECT idCategoria FROM categoria WHERE estado = 'activo'";
				$sql = ModeloPrincipal::conectardb()->prepare($query);
			}
			$sql->execute();
			return $sql;
		}

	}








	