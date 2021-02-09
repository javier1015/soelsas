<?php 


/**
 * 
 */
require_once "../core/modeloPrincipal.php";
class PagoModelo extends ModeloPrincipal{
	protected function registraTrabajoModelo($datos){
		$query = "INSERT INTO detalleactividad (idactividad_fk, docusuario3_fk, cantidad) VALUES (:idatividad, :docusuario, :cantidad)";
		$sql = ModeloPrincipal::conectardb()->prepare($query);
		$sql->bindParam(":idatividad", $datos['idatividad']);
		$sql->bindParam(":docusuario", $datos['docusuario']); 
		$sql->bindParam(":cantidad", $datos['cantidad']);	
		$sql->execute();
		return $sql;
	}
}

// seria que heran esas comillas?? depron probemos