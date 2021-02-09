<?php 
	//usuarioControlador.php
	/**
	 * 
	 */
	if(@$url==1){
		require_once "../../modelo/usuarioModelo.php";
	}else{
		require_once "../modelo/usuarioModelo.php";
	}
	class UsuarioControlador extends UsuarioModelo{
		

		public function registraUsuarioControlador(){
			$tipodoc = $_POST['tipodoc'];
			$doc = $_POST['doc'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$direccion = $_POST['dir'];
			$tel = $_POST['tel'];
			$user = $_POST['user'];
			$clave1 = $_POST['clave1'];
			$clave2 = $_POST['clave2'];
			$rol = $_POST['rol'];

			//Validar que las contraseñas sean iguales.
			if($clave1!=$clave2){
				$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'> Las contraseñas no coinciden </div>";
			}else{
				//consultar el documento para validar si este ya esta registrado en el sistema.
				$cons1 = ModeloPrincipal::consultaSimple("SELECT doc FROM usuario WHERE doc='$doc'");
				if($cons1->rowcount()>=1){
					$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Este documento ya está registrado en el sistema </div>";
				}else{
					//consultar el usuario para validar si este ya esta registrado en el sistema.
					$cons2 = ModeloPrincipal::consultaSimple("SELECT usuario FROM usuario WHERE usuario='$user'");
					if($cons2->rowcount()>=1){
						$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>El usuario que ingresaste ya está registrado en el sistema</div>";
					}else{
						//datos para registrar cuenta usuario.
						$datosUsuario=[
							"doc"=>$doc,
							"usuario"=>$user,
							"clave"=>$clave1
						];

						//ejecutamos la funcion registraCuentaUsuarioModelo y verificamos si se efectuo el registro.
						$registraCuentaUsuario = UsuarioModelo::registraCuentaUsuarioModelo($datosUsuario);
						if($registraCuentaUsuario->rowcount()==1){
							$datosRol=[
								"rol"=>$rol,
								"doc"=>$doc,
								"estado"=>'Activo'
							];
							//ejecutamos la funcion registraDatosRolModelo y verificamos si se efectuo el registro.
							$registraDatosRol = UsuarioModelo::registraDatosRolModelo($datosRol);
							if($registraDatosRol->rowcount()==1){
								$datosUsuario=[
									"tipodoc"=>$tipodoc,
									"doc"=>$doc,
									"nombre"=>$nombre,
									"apellido"=>$apellido,
									"direccion"=>$direccion,
									"tel"=>$tel
								];
								//ejecutamos la funcion registraDatosUsuarioModelo y verificamos si se efectuo el registro.
								$registraDatosUsuario = UsuarioModelo::registraDatosUsuarioModelo($datosUsuario);
								if($registraDatosUsuario->rowcount()==1){
									$mensaje = "<div class='alert alert-primary' role='alert'>Registro exitoso</div>";
								}else{
									$eliminarDatosRol = UsuarioModelo::eliminaDatosRolModelo($doc);
									$eliminarCuentaUsuario = UsuarioModelo::eliminaCuentaUsuarioModelo($doc);
									$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>No se registraron los datos de usuario</div>";
								}
							}else{
								$eliminarCuentaUsuario = UsuarioModelo::eliminaCuentaUsuarioModelo($doc);
								$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>No se pudo registrar rol</div>";
							}
						}else{
							$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>No se pudo registrar la cuenta</div>";
						}
					}
				}
			}
			return $mensaje;
		}

		public function listaUsuarioControlador($tipo, $doc){
			if($tipo=="general"){
				$query = "SELECT u.doc,t.nombreUsuario,t.apellidoUsuario,t.direccionUsuario,t.telefonoUsuario,t.fechaRegistro,r.nombreRol from detalleusuario t INNER JOIN usuario u on t.docusuario1_fk = u.doc INNER JOIN detallerol d on u.doc = d.idusuario INNER JOIN rol r on d.idrol_fk = r.idRol WHERE u.estadoUsuario = 'activo'";
				$sql = ModeloPrincipal::consultaSimple($query);

			}else if($tipo=="unico"){
				$query = "SELECT u.doc,t.nombreUsuario,t.apellidoUsuario,t.direccionUsuario,t.telefonoUsuario,t.fechaRegistro,r.nombreRol from detalleusuario t INNER JOIN usuario u on t.docusuario1_fk = u.doc INNER JOIN detallerol d on u.doc = d.idusuario INNER JOIN rol r on d.idrol_fk = r.idRol WHERE u.estadoUsuario = 'activo' AND  t.docusuario1_fk LIKE'%$doc%'";
				$sql = ModeloPrincipal::consultaSimple($query);
			} 
			$sql->execute();
			foreach ($sql as $value) {
				echo '		<tr>
								<td class="mdl-data-table__cell--non-numeric">'.$value[0].'</td>
								<td class="mdl-data-table__cell--non-numeric">'.$value[1].'</td>
								<td class="mdl-data-table__cell--non-numeric">'.$value[2].'</td>
					    		<td class="mdl-data-table__cell--non-numeric">'.$value[3].'</td>
								<td class="mdl-data-table__cell--non-numeric">'.$value[4].'</td>
								<td class="mdl-data-table__cell--non-numeric">'.$value[5].'</td>
								<td class="mdl-data-table__cell--non-numeric">'.$value[6].'</td>
				';?>				
								<td class="mdl-data-table__cell--non-numeric">				
									<a href="javascript:;" style="height:300;" class="btn btn-success" data-toggle="modal" data-target="#actializaUsuario" onclick="actualizaUsuario('<?php echo $value[0] ?> ', '<?php echo $value[1] ?>','<?php echo $value[2] ?>', '<?php echo $value[3] ?>', '<?php echo $value[4] ?>');">Editar</a>
                  				</td>
                  				<td class="mdl-data-table__cell--non-numeric">
									<button style="height:300;" type="button" class="btn btn-danger" onclick="eliminaUsuario(<?php echo $value[0] ?>)">Eliminar</button>
                  				</td>
							</tr>
				<?php
			}
		}

		public function actualizaUsuarioControlador(){
			$doc = $_POST['doc'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$dir = $_POST['dir'];
			$tel = $_POST['tel'];
			if(trim($doc)!="" && trim($nombre)!="" && trim($apellido)!="" && trim($dir)!="" && trim($tel)!=""){
				$datosActualizarUsuario=[
					"doc"=>$doc,
					"nombre"=>$nombre,
					"apellido"=>$apellido,
					"direccion"=>$dir,
					"tel"=>$tel
				];
				$actualizaUsuario = UsuarioModelo::actualizaDatosUsuarioModelo($datosActualizarUsuario);
				if($actualizaUsuario->rowcount()>=1){
					$mensaje = "<div class='alert alert-primary' role='alert'>Actualizacion exitosa</div>";
				}else{
					$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Ocurrió  un error al actualizar los datos del empleado. </div>";
				}
			}else{
				$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Asegúrate de llenar todos los campos del formulario. </div>";
			}
			return $mensaje;
		}

		

		public function eliminaUsuarioControlador(){
			$doc= $_POST['doc'];
			if(trim($doc)!=""){
				$eliminaUsuario = UsuarioModelo::eliminaDatosUsuarioModelo($doc);
				if($eliminaUsuario->rowcount()>=1){
					$mensaje = "<div class='alert alert-primary' role='alert'>Registro eliminado exitosamente</div>";
				}else{
					$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>No se pudo eliminar el usuari</div>";
				}
			}else{
				$mensaje = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Debes seleccionar un registro</div>";
			}
			return $mensaje; 
		}	


		//Llenar formulario de datos personal
		public function datosUsuarioControlador($tipo, $doc){
			return UsuarioModelo::datosUsuarioModelo($tipo, $doc);
		}	

		//Actualizar datos personales
		public function actualizaUsuarioLogueadoControlador(){
			$doc = $_POST['doc'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$dir = $_POST['dir'];
			$tel = $_POST['tel'];
			if(trim($doc)!="" && trim($nombre)!="" && trim($apellido)!="" && trim($dir)!="" && trim($tel)!=""){
				$datos = [
					"doc"=>$doc,
					"nombre"=>$nombre,
					"apellido"=>$apellido,
					"direccion"=>$dir,
					"tel"=>$tel
				];
				$actualizarDatos = UsuarioModelo::actualizaUsuarioModelo($datos);
				if($actualizarDatos->rowcount()==1){
					$mensaje = "<div class='alert alert-primary'>Actualizacion exitosa.</div>";
				}else{
					$mensaje = "<div class='alert alert-warning'>Verifica que hallas realizado cambios.</div>";
				}
			}else{
				$mensaje = "<div class='alert alert-danger'>Todos los campos de este formulario deben ser llenados obligatoriamente</div>";
			}
			return $mensaje;
		}

		//Actualizar cuenta de usuario controlador
		public function actualizaCuentaControlador(){
			$doc = $_POST['doc'];
			$user = $_POST['user'];
			$claveOri = $_POST['claveOriginal'];
			$claveNueva = $_POST['claveNueva'];
			$claveVerifi = $_POST['claveVerifica'];

			if(trim($doc)!="" && trim($user)!="" && trim($claveOri)!="" && trim($claveNueva)!="" && trim($claveVerifi)!=""){
				//validar si la clave original es correcta.
				$validarClave = "SELECT * FROM usuario WHERE doc=$doc AND clave=$claveOri"; 
				$consulta1 = ModeloPrincipal::consultaSimple($validarClave);
				if($consulta1->rowcount()==1){
					//condicional para validar que las contraseñas sean iguales
					if($claveNueva==$claveVerifi){
						$datosCuenta = [
							"doc"=>$doc,
							"user"=>$user,
							"clave"=>$claveNueva
						];
						$actualizaCuenta = UsuarioModelo::actualizaCuentaModelo($datosCuenta);
						if($actualizaCuenta->rowcount()==1){
							$mensaje = "<div class='alert alert-primary'>Actualizacion exitosa.</div>";
						}else{	
							$mensaje = "<div class='alert alert-danger'>No has modificado ningún  dato.</div>";
						}

					}else{
						$mensaje = "<div class='alert alert-warning'>Las contraseñas ingresadas no coinciden.</div>";
					}
				}else{
					$mensaje = "<div class='alert alert-warning'>La contraseña actual no coincide con la ingresada.</div>";
				}
			}else{
				$mensaje = "<div class='alert alert-warning'>Todos los campos de este formulario deben ser llenados obligatoriamente.</div>";
			}
			return $mensaje;
		}

		
	}
