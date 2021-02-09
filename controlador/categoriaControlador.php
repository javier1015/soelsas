<?php 
	//categoriaControlador.php
	/**
	 * 
	 */
	
	if(@$urlC==1){
		require_once "../../modelo/categoriaModelo.php";
	}else{
		require_once "../modelo/categoriaModelo.php";
	}
	class CategoriaControlador extends CategoriaModelo{
		

		public function registraCategoriaControlador(){
			$nomCate = $_POST['NomCate'];
			$dEsCate = $_POST['DEsCate'];
			if(trim($nomCate)!=""){

				//consultar el documento para validar si este ya esta registrado en el sistema.
				$cons1 = ModeloPrincipal::consultaSimple("SELECT nombreCategoria FROM categoria WHERE nombreCategoria='$nomCate'");
				if($cons1->rowcount()>=1){
					$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Esta categoría ya está registrada en el sistema.</div>";
				}else{
					//datos para registrar cuenta usuario.
					$datos=[
						"nombre"=>$nomCate,
						"descripcion"=>$dEsCate
					];
					$registrarCategoria = CategoriaModelo::registraCategoriaModelo($datos);
					if($registrarCategoria->rowcount()==1){
						$mensaje = "<div class='alert alert-primary' role='alert'>Registro exitoso.</div>";
					}else{
						$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>No se registró la Categoría.</div>";
					}
				}
		    }else{
		    	$mensaje="<div class='alert alert-warning alert-dismissible fade show' role='alert'>falta nombre de la categoría.</div>";
		    }
			return $mensaje;
		}

		public function listaCategoriaControlador($tipo, $nom){
			if($tipo=="general"){
				$query = "SELECT idCategoria, nombreCategoria, descripcionCAtegoria FROM categoria WHERE estado='activo'";
				$sql = ModeloPrincipal::consultaSimple($query);

			}else if($tipo=="unico"){
				$query = "SELECT idCategoria, nombreCategoria, descripcionCAtegoria FROM categoria WHERE nombreCategoria LIKE'%$nom%'";
				$sql = ModeloPrincipal::consultaSimple($query);
			}
			$sql->execute();
			foreach ($sql as $value) {
				echo '		<tr>
								<td class="mdl-data-table__cell--non-numeric">'.$value[1].'</td>
								<td class="mdl-data-table__cell--non-numeric">'.$value[2].'</td>
			    ';?>				
								<td class="mdl-data-table__cell--non-numeric">				
									<a href="javascript:;" style="height:300;" class="btn btn-success" data-toggle="modal" data-target="#actualizaCategoria" onclick="actualizaCategoria('<?php echo $value[0] ?>','<?php echo $value[1] ?>','<?php echo $value[2] ?>');">Editar</a>
                  				</td>
                  				<td class="mdl-data-table__cell--non-numeric">
									<button style="height:300;" type="button" class="btn btn-danger" onclick="eliminaCategoria(<?php echo $value[0] ?>)">Eliminar</button>
                  				</td>
							</tr>
				<?php
			}
		}


		public function actualizaCategoriaControlador(){
			$id = $_POST['id'];
			$nom = $_POST['nom'];
			$des = $_POST['des'];
			if( trim($id)!="" && trim($nom)!=""){
				$datosActualizarCategoria=[
					"id"=>$id,
					"nom"=>$nom,
					"des"=>$des
				];
				$actualizaCategoria = CategoriaModelo::actualizaDatosCategoriaModelo($datosActualizarCategoria);
				if($actualizaCategoria->rowcount()>=1){
					$mensaje = "<div class='alert alert-primary' role='alert'>Actualizacion exitosa</div>";
				}else{
					$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Ocurrió un error al actualizar los datos de la categoría.</div>";
				}
			}else{
				$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Falta el nombre.</div>";
			}
			return $mensaje;
		}


		public function eliminaCategoriaControlador(){
			$id = $_POST['id'];
			if(trim($id)!=""){
				$elimina = CategoriaModelo::eliminaDatosCategoriaModelo($id);
				if($elimina->rowcount()>=1){
					$mensaje = "<div class='alert alert-primary' role='alert'>Registro eliminado exitosamente</div>";
				}else{
					$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>No se pudo eliminar</div>";
				}
			}else{
				$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Debes seleccionar un registro</div>";
			}
			return $mensaje; 
		}

		//contar categorias
		public function datosCategoriaControlador($tipo, $id){
			return CategoriaModelo::datosCategoriaModelo($tipo, $id);
		}


	}