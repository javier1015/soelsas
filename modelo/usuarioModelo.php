

<?php  
	/**
	 * 
	 */
	if(@$url==1){
		require_once "../../core/modeloPrincipal.php";
	}else{
		require_once "../core/modeloPrincipal.php";
	}
	class UsuarioModelo extends ModeloPrincipal{
		
		protected function registraCuentaUsuarioModelo($datos){
			$query = "INSERT INTO usuario (doc, usuario, clave)VALUES(:doc, :usuario, :clave)";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":doc", $datos['doc']);
			$sql->bindParam(":usuario", $datos['usuario']);
			$sql->bindParam(":clave", $datos['clave']);
			$sql->execute();
			return $sql;
		}

		protected function eliminaCuentaUsuarioModelo($doc){
			$query = "DELETE FROM usuario WHERE doc = :id";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":id", $doc);
			$sql->execute();
			return $sql;
		}

		protected function registraDatosUsuarioModelo($datos){
			$query = "INSERT INTO detalleusuario (idtipodocu_fk, docusuario1_fk, nombreUsuario, apellidoUsuario, direccionUsuario, telefonoUsuario)VALUES(:tipodoc, :doc, :nombre, :apellido, :direccion, :tel)";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":tipodoc", $datos['tipodoc']);
			$sql->bindParam(":doc", $datos['doc']);
			$sql->bindParam(":nombre", $datos['nombre']);
			$sql->bindParam(":apellido", $datos['apellido']);
			$sql->bindParam(":direccion", $datos['direccion']);
			$sql->bindParam(":tel", $datos['tel']);
			$sql->execute();
			return $sql;
		}

		protected function actualizaDatosUsuarioModelo($datos){
			$query = "UPDATE detalleusuario SET nombreUsuario=:nombre, apellidoUsuario=:apellido, direccionUsuario=:direccion, telefonoUsuario=:tel WHERE docusuario1_fk=:doc";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":doc", $datos['doc']);
			$sql->bindParam(":nombre", $datos['nombre']);
			$sql->bindParam(":apellido", $datos['apellido']);
			$sql->bindParam(":direccion", $datos['direccion']);
			$sql->bindParam(":tel", $datos['tel']);
			$sql->execute();
			return $sql;
		}

		protected function eliminaDatosUsuarioModelo($doc){
			$query = "UPDATE usuario SET estadoUsuario ='inactivo' WHERE doc=:doc";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":doc", $doc);
			$sql->execute();
			return $sql;
		}

		protected function registraDatosRolModelo($datos){
			$query = "INSERT INTO detallerol (idrol_fk, idusuario, estadoRol)VALUES(:rol, :doc, :estado)";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":rol", $datos['rol']);
			$sql->bindParam(":doc", $datos['doc']);
			$sql->bindParam(":estado", $datos['estado']);
			$sql->execute();
			return $sql;
		}

		protected function eliminaDatosRolModelo($doc){
			$query = "DELETE FROM detallerol WHERE idusuario=:doc";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":doc", $doc);
			$sql->execute();
			return $sql;
		}

		//Funcion para llenar formulario de actualizacion de usuario logueado.
		protected function datosUsuarioModelo($tipo, $doc){
			if($tipo=="unico"){
				
				$query = "SELECT  * FROM detalleusuario WHERE docusuario1_fk = :doc";
				$sql = ModeloPrincipal::conectardb()->prepare($query);
				$sql->bindParam(":doc", $doc);

			}else if($tipo=="conteo"){
				
				$query = "SELECT doc FROM usuario WHERE estadoUsuario = 'activo'";
				$sql = ModeloPrincipal::conectardb()->prepare($query);

			}
			$sql->execute();
			return $sql;
		}

		//Funcion modelo para actualizar datos de usuario logueado.
		protected function actualizaUsuarioModelo($datos){
			$query = "UPDATE detalleusuario SET nombreUsuario = :nombre, apellidoUsuario = :apellido, direccionUsuario = :direccion, telefonoUsuario = :tel WHERE docusuario1_fk = :doc";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":doc", $datos['doc']);
			$sql->bindParam(":nombre", $datos['nombre']);
			$sql->bindParam(":apellido", $datos['apellido']);
			$sql->bindParam(":direccion", $datos['direccion']);
			$sql->bindParam(":tel", $datos['tel']);
			$sql->execute();
			return $sql;
		}

		//Funcion modelo para actualizar cuenta de usuario.
		protected function actualizaCuentaModelo($datos){
			$query = "UPDATE usuario SET usuario = :user, clave = :clave WHERE doc= :doc";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":doc", $datos['doc']);
			$sql->bindParam(":user", $datos['user']);
			$sql->bindParam(":clave", $datos['clave']);
			$sql->execute();
			return $sql;
		}
		
	}

