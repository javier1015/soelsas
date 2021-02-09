<?php 
	//categoriaControlador.php
	/**
	 * 
	 */
	

	if(@$urlA==1){
		require_once "../../modelo/actividadModelo.php";
	}else{
		require_once "../modelo/actividadModelo.php";
	}
	class ActividadControlador extends ActividadModelo{
		

		public function registraActividadControlador(){
			$nomActi= $_POST['NomActi'];
			$Precio = $_POST['Precio'];
			if(trim($nomActi)!="" && trim($Precio)!=""){

				//consultar el nombre para validar si este ya esta registrado en el sistema.
				$cons1 = ModeloPrincipal::consultaSimple("SELECT nomActividad FROM actividad WHERE nomActividad='$nomActi'");
				if($cons1->rowcount()>=1){
					$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Esta actividad ya está registrada en el sistema.</div>";
				}else{
					//datos para registrar actividad.
					$datos=[
						"nombre"=>$nomActi,
						"precio"=>$Precio
					];
					$registrarActividad = ActividadModelo::registraActividadModelo($datos);
					if($registrarActividad->rowcount()==1){
						$mensaje = "<div class='alert alert-primary' role='alert'>Registro exitoso.</div>";
					}else{
						$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>No se registró la actividad.</div>";
					}
				}
		    }else{
		    	$mensaje="<div class='alert alert-warning alert-dismissible fade show' role='alert'>faltan datos.</div>";
		    }
			return $mensaje;
		}


		public function listaActividadControlador($tipo, $nom){
			if($tipo=="general"){
				$query = "SELECT idActividad, nomActividad, precioUnidad FROM actividad WHERE estadoActividad ='activo'";
				$sql = ModeloPrincipal::consultaSimple($query);

			}else if($tipo=="unico"){
				$query = "SELECT idActividad, nomActividad, precioUnidad FROM actividad WHERE nomActividad LIKE'%$nom%'AND estadoActividad ='activo'";
				$sql = ModeloPrincipal::consultaSimple($query);
			}
			$sql->execute();
			foreach ($sql as $value) {
				echo '		<tr>
								<td class="mdl-data-table__cell--non-numeric">'.$value[1].'</td>
								<td class="mdl-data-table__cell--non-numeric">'.$value[2].'</td>
			    ';?>				
								<td class="mdl-data-table__cell--non-numeric">				
									<a href="javascript:;" style="height:300;" class="btn btn-success" data-toggle="modal" data-target="#actualizaActividad" onclick="actualizaActividad('<?php echo $value[0] ?> ','<?php echo $value[1] ?>','<?php echo $value[2] ?>');">Editar</a>
                  				</td>
                  				<td class="mdl-data-table__cell--non-numeric">
									<button style="height:300;" type="button" class="btn btn-danger" onclick="eliminaActividad(<?php echo $value[0] ?>)">Eliminar</button>
                  				</td>
							</tr>
				<?php
			}
		}


		public function actualizaActividadControlador(){
			$id = $_POST['idac'];
			$nom = $_POST['nomac'];
			$pre = $_POST['preac'];
			if( trim($id)!="" && trim($nom)!="" && trim($pre)!=""){
				$datosActualizarActividad=[
					"id"=>$id,
					"nom"=>$nom,
					"pre"=>$pre
				];
				$actualizaActividad = ActividadModelo::actualizaDatosActividadModelo($datosActualizarActividad);
				if($actualizaActividad->rowcount()>=1){
					$mensaje = "<div class='alert alert-primary' role='alert'>Actualizacion exitosa</div>";
				}else{
					$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Ocurrio un error al actualizar los datos de la actividad</div>";
				}
			}else{
				$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Asegurate de llenar todos los campos del formulario.</div>";
			}
			return $mensaje;
		}



		public function eliminaActividadControlador(){
			$id = $_POST['id'];
			if(trim($id)!=""){
				$elimina = ActividadModelo::eliminaDatosActividadModelo($id);
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
		public function datosActiControlador($tipo, $id){
			return ActividadModelo::datosActiModelo($tipo, $id);
		}	

	}






	