<?php 
	if(isset($_POST['userName'])){
		require_once "./core/modeloPrincipal.php";
	}else{
		require_once "../core/modeloPrincipal.php";
	}
	class LoginModelo extends ModeloPrincipal{
		
		protected function iniciaSesionModelo($datos){
			$query = "SELECT  * FROM vista_usuario WHERE usuario=:user AND clave=:pass AND estadoRol='Activo'";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":user", $datos['user']);
			$sql->bindParam(":pass", $datos['pass']);
			$sql->execute();
			return $sql;
		}

		protected function registraBitacoraModelo($datos){
			$query = "CALL insert_bitacora(:cod, :doc, :fechafin, :horaFinal, :opcion)";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":cod", $datos['cod']);
			$sql->bindParam(":doc", $datos['doc']);
			$sql->bindParam(":fechafin", $datos['fechafin']);
			$sql->bindParam(":horaFinal", $datos['horaFinal']);
			$sql->bindParam(":opcion", $datos['opcion']);
			$sql->execute();
			return $sql;
		}

		protected function cerrarSesionModelo($datos){
			if($datos['user']!=""){
				$actualizaBitacora = self::actualizaBitacoraModelo($datos['codBita'], $datos['opcion']);
				if($actualizaBitacora->rowcount()==1){
					session_unset();
					session_destroy();
					$res = "si";
				}else{
					$res = "no se pudo actualizar";
				}
			}else{
				$res = "no";
			}
			return $res;
		}

		protected function actualizaBitacoraModelo($cod, $opcion){
			$query = "CALL update_bitacora(:cod, :opcion)";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":cod", $cod);
			$sql->bindParam(":opcion", $opcion);
			$sql->execute();
			return $sql;
		}
		// protected function actualizaBitacoraModelo($cod, $opcion){
		// 	$query = "CALL insert_bitacora(:cod, :opcion)";
		// 	$sql = ModeloPrincipal::conectardb()->prepare($query);
		// 	$sql->bindParam(":cod", $cod);
		// 	$sql->bindParam(":opcion", $opcion);
		// 	$sql->execute();
		// 	return $sql;
		// }

	}
