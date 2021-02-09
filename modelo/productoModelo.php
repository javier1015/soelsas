<?php  
	/**
	 * 
	 */
	if(@$urlp==1){
		require_once "../../core/modeloPrincipal.php";
	}else{
		require_once "../core/modeloPrincipal.php";
	}
	
	class ProductoModelo extends ModeloPrincipal{
		
		protected function registraProductoModelo($datos){
			$query = "INSERT INTO producto (idProducto, idCategoria_fk, nombreProducto)VALUES(:pt,:cate,:nombre)";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":pt", $datos['pt']);
			$sql->bindParam(":cate", $datos['cate']);
			$sql->bindParam(":nombre", $datos['nombre']);
			$sql->execute();
			return $sql;
		}

			protected function actualizaDatosProductoModelo($datos){
			$query = "UPDATE producto SET nombreProducto=:nom, idCategoria_fk=:cate WHERE idProducto=:id";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":id", $datos['id']);
			$sql->bindParam(":nom", $datos['nom']);
			$sql->bindParam(":cate", $datos['cate']);	
			$sql->execute();
			return $sql;
		}


			protected function eliminaDatosProductoModelo($id){
			$query = "UPDATE producto SET estadoProducto = 'desactivado' WHERE idProducto=:id";
			$sql = ModeloPrincipal::conectardb()->prepare($query);
			$sql->bindParam(":id", $id);
			$sql->execute();
			return $sql;
		}


		//Funcion para contar los productos 
		protected function datosProductoModelo($tipo, $pt){
			if($tipo=="conteo"){
				$query = "SELECT idProducto FROM producto WHERE estadoProducto = 'activo'";
				$sql = ModeloPrincipal::conectardb()->prepare($query);
			}
			$sql->execute();
			return $sql;
		}

	}



	