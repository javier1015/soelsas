<?php  
	/**
	 * 
	 */

	if(@$urlA==1){
		require_once "../../core/modeloPrincipal.php";
	}else{
		require_once "../core/modeloPrincipal.php";
	}
	class ActividadModelo extends ModeloPrincipal{
		
		protected function registraActividadModelo($datos){
			$query = "INSERT INTO actividad (nomActividad, precioUnidad)VALUES(:nombre, :precio)";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":nombre", $datos['nombre']);
			$sql->bindParam(":precio", $datos['precio']);
			$sql->execute();
			return $sql;
		}

		protected function actualizaDatosActividadModelo($datos){
			$query = "UPDATE actividad SET nomActividad=:nom, precioUnidad=:pre WHERE idActividad=:id";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":id", $datos['id']);
			$sql->bindParam(":nom", $datos['nom']);
			$sql->bindParam(":pre", $datos['pre']);
			
			
			$sql->execute();
			return $sql;
		}


		protected function eliminaDatosActividadModelo($id){
			$query = "UPDATE actividad SET estadoActividad ='desactivado' WHERE idActividad=:id";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":id", $id);
			$sql->execute();
			return $sql;
		}

			//Funcion para contar categoria
		protected function datosActiModelo($tipo, $id){
			if($tipo=="conteo"){
				$query = "SELECT idActividad FROM actividad WHERE 	estadoActividad = 'activo'";
				$sql = ModeloPrincipal::conectardb()->prepare($query);
			}
			$sql->execute();
			return $sql;
		}
		


	}






	