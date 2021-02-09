<?php 
	//categoriaControlador.php
	/**
	 * 
	 */
	if(@$urlp==1){
		require_once "../../modelo/productoModelo.php";
	}else{
		require_once "../modelo/productoModelo.php";
	}

	class ProductoControlador extends ProductoModelo{
		

		public function registraProductoControlador(){
			$pt = $_POST['Pt'];
			$nom = $_POST['Nombre'];
			$cate = $_POST['cate'];
			if(trim($pt)!="" && trim($nom)!="" && trim($cate)!=""){

				//consultar el pt para validar si este ya esta registrado en el sistema.
				$cons1 = ModeloPrincipal::consultaSimple("SELECT idProducto	 FROM producto WHERE idProducto='$pt'");
				if($cons1->rowcount()>=1){
					$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Este producto ya está registrado en el sistema.</div>";
				}else{
					//datos para registrar pt.
					$datos=[
						"pt"=>$pt,
						"nombre"=>$nom,
						"cate"=>$cate
					];
					$registrarProducto = ProductoModelo::registraProductoModelo($datos);
					if($registrarProducto->rowcount()==1){
						$mensaje = "<div class='alert alert-primary' role='alert'>Registro exitoso.</div>";
					}else{
						$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>No se registró el producto.</div>";
					}
				}
		    }else{
		    	$mensaje="<div class='alert alert-warning alert-dismissible fade show' role='alert'>faltan datos.</div>";
		    }
			return $mensaje;
		}

		public function listaProductoControlador($tipo, $pt){
			if($tipo=="general"){
				$query = "SELECT idProducto, nombreProducto, nombreCategoria, idCategoria_fk FROM producto, categoria WHERE idCategoria = idCategoria_fk AND estadoProducto = 'activo'";
				$sql = ModeloPrincipal::consultaSimple($query);

			}else if($tipo=="unico"){
				$query = "SELECT idProducto, nombreProducto, nombreCategoria FROM producto, categoria  WHERE idCategoria = idCategoria_fk AND idProducto LIKE'%$pt%'AND estadoProducto = 'activo' ";
				$sql = ModeloPrincipal::consultaSimple($query);
			}
			$sql->execute();
			foreach ($sql as $value) {
				echo '		<tr>
								<td class="mdl-data-table__cell--non-numeric">'.$value[0].'</td>
								<td class="mdl-data-table__cell--non-numeric">'.$value[1].'</td>
								<td class="mdl-data-table__cell--non-numeric">'.$value[2].'</td>
			    ';?>				
								<td class="mdl-data-table__cell--non-numeric">				
									<a href="javascript:;" style="height:300;" class="btn btn-success" data-toggle="modal" data-target="#actualizaProducto" onclick="actualizaProducto('<?php echo $value[0] ?> ', '<?php echo $value[1] ?>', '<?php echo $value[3] ?>', '<?php echo $value[2] ?>');">Editar</a>
                  				</td>
                  				<td class="mdl-data-table__cell--non-numeric">
									<button style="height:300;" type="button" class="btn btn-danger" onclick="eliminaProducto(<?php echo $value[0] ?>)">Eliminar</button>
                  				</td>
							</tr>
				<?php
			}
		}

		public function actualizaProductoControlador(){
			$id = $_POST['id'];
			$nom = $_POST['nom'];
			$cate = $_POST['cate'];
			if( trim($id)!="" && trim($nom)!="" && trim($cate)!=""){
				$datosActualizarProducto=[
					"id"=>$id,
					"nom"=>$nom,
					"cate"=>$cate
				];
				$actualizaProducto = ProductoModelo::actualizaDatosProductoModelo($datosActualizarProducto);
				if($actualizaProducto->rowcount()>=1){
					$mensaje = "<div class='alert alert-primary' role='alert'>Actualizacion exitosa</div>";
				}else{
					$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Ocurrió un error al actualizar los datos del producto. Asegurate de realizar cambios</div>";
				}
			}else{
				$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Asegúrate de llenar todos los campos del formulario.</div>";
			}
			return $mensaje;
		}


		public function eliminaProductoControlador(){
			$id = $_POST['id'];
			if(trim($id)!=""){
				$elimina = ProductoModelo::eliminaDatosProductoModelo($id);
				if($elimina->rowcount()>=1){
					$mensaje = "<div class='alert alert-primary' role='alert'>Registro eliminado exitosamente</div>";
				}else{
					$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>No se pudo eliminar</div> ";
				}
			}else{
				$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Debes seleccionar un registro</div>";
			}
			return $mensaje; 
		}	

	//contar productos 
		public function datosProductoControlador($tipo, $pt){
			return ProductoModelo::datosProductoModelo($tipo, $pt);
		}

	}





	