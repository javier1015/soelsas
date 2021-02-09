<?php 


/**
 * 
 */
require_once "../modelo/pagoModelo.php";
class PagoControlador extends PagoModelo{
	public function registraTrabajoControlador(){
		$usuario= $_POST['usuario'];
		$actividad= $_POST['actividad'];
		$cantidad= $_POST['cantidad'];
		if(trim($usuario)!="" && trim($actividad) !="" & trim($cantidad) !=""){
			$consulta1 = ModeloPrincipal::consultaSimple("SELECT * FROM usuario WHERE doc='$usuario'");
			if($consulta1->rowcount()==1){
				$datosCargaTrabajo = [
					"docusuario"=>$usuario,
					"idatividad"=>$actividad, 
					"cantidad"=>$cantidad 
				];
				$registraCargaTrabajo = PagoModelo::registraTrabajoModelo($datosCargaTrabajo);
				if($registraCargaTrabajo->rowcount()==1){
					$mensaje = "<div class='alert alert-primary' role='alert'>Registro exitoso</div>";
				}else{
					$mensaje = "<div class='alert alert-danger'>Ocurrio un error no se pudo registrar el pago</div>";
				}
			}else{
				$mensaje = "<div class='alert alert-danger'>El usuario ingresado no esta registrado en el sistema</div>";
			}
		}else{
			$mensaje = "<div class='alert alert-danger'>Todos los campos de este formulario son obligatorios</div>";
		}
		return $mensaje;
	}
}
