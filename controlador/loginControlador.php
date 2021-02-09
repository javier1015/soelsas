<?php 
	if(isset($_POST['userName'])){
		require_once "./core/configGeneral.php";
		require_once "./modelo/loginModelo.php";
	}else{
		require_once "../core/configGeneral.php";
		require_once "../modelo/loginModelo.php";
	}

	class LoginControlador extends LoginModelo{
		
		public function iniciaSesionControlador(){
			$user = $_POST['userName'];
			$pass = $_POST['pass'];

			//condicional para validar que los campos no esten vacios.
			if(trim($user)!="" && trim($pass)!=""){
				$datosInicio=[
					"user"=>$user,
					"pass"=>$pass
				];
				
				//ejecuta la funcion inicia sesion modelo y validar si el usuario existe.
				$iniciaSesion = LoginModelo::iniciaSesionModelo($datosInicio);
				if($iniciaSesion->rowcount()==1){
					$registro = $iniciaSesion->fetch();

					$consulta = ModeloPrincipal::consultaSimple("SELECT codbitacora FROM bitacora");
					$num = $consulta->rowcount()+1;

					//Generar codigo para la bitacora
					$codbitacora = ModeloPrincipal::generarCodigo("B", 7, $num);

					$datosBitacora = [
						"cod"=>$codbitacora,
						"doc"=>$registro['doc'],
						"fechafin"=>'Indefinida',
						"horaFinal"=>'Indefinida',
						"opcion"=>'guardar'
					];
					//registrar bitacora
					$registraBitacora = LoginModelo::registraBitacoraModelo($datosBitacora);
					if($registraBitacora->rowcount()==1){
						session_start();
						$_SESSION['verificar']=true;
						$_SESSION['user']=$registro['nombreUsuario'];
						$_SESSION['nameuser']=$registro['usuario'];
						$_SESSION['codbita']=$codbitacora;
						$_SESSION['tipouser']=$registro['nombreRol'];
						$_SESSION['documento']=$registro['doc'];

						if($registro['nombreRol']=="administrador"){
							$ruta = SERVERURL."vista/plantilla.php";
						}else{
							$ruta = SERVERURL."vista/contenido/home.php";
						}
						return '<script> window.location="'.$ruta.'" </script>';
					}else{
						$mensaje = "ocurrió un error técnico intente nuevamente";
					}
				}else{
					$mensaje = "Datos incorrectos";
				}
			}else{
				$mensaje = "Datos insuficientes ";
			}
			return $mensaje;
		}

		public function cerrarSesionControlador(){
			session_start();
			$datosCerraSesion = [
				"user"=>$_SESSION['user'],
				"codBita"=>$_SESSION['codbita'],
				"opcion"=>'actualizar'
			];
			return $cerrarSesion = LoginModelo::cerrarSesionModelo($datosCerraSesion);
		}

		public function forzarCierreSesion(){
			session_start();
			session_destroy();
			return header("Location:".SERVERURL);
		}

	}




