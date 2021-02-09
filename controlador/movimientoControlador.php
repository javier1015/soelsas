<?php 

/**
 * 
 */

	if(@$urlM==1){
		require_once "../../modelo/movimientoModelo.php";
	}else{
		require_once "../modelo/movimientoModelo.php";
	}
class MovimientoControlador extends MovimientoModelo
{
	
	public function registraMovimientoControlador(){
		$tipo = $_POST['tipo'];
		$idpt = $_POST['codPT'];
		$cantidad = $_POST['cantidad'];
		$codigoMovimiento = $_POST['codM'];

		if(trim($idpt)!="" && trim($cantidad)!=""){
			$consultarPT = ModeloPrincipal::consultaSimple("SELECT nombreProducto FROM producto WHERE idProducto='$idpt' AND estadoProducto='activo'");
			if($consultarPT->rowcount()==1){
				$consulta1 = ModeloPrincipal::consultaSimple("SELECT idmovimiento FROM movimiento WHERE idtipoMovimiento='$tipo'");
				$contador = $consulta1->rowcount()+1;

				//Generar identificador unico
				$idMovimiento = ModeloPrincipal::generarCodigo("id", 7, $contador);
				
				//Generar codigo identificador alternativo
				if(trim($codigoMovimiento)==""){
					// $codMovimiento = ModeloPrincipal::generarCodigo("codU", 7, $contador);
					session_start();
					$docUser = $_SESSION['documento'];
					$datosMovi=[
						"idmovimiento"=>$idMovimiento,
						"idTipoM"=>$tipo,
						"docUsuario"=>$docUser,
						"estadoMovimiento"=>'activo',
						"contadorM"=>$contador
					];
					$registraMovi= MovimientoModelo::registraMovimientoModelo($datosMovi);
					if($registraMovi->rowcount()>=1){
						$datosDetalleMovi=[
							"idMovimiento"=>$idMovimiento,
							"cantidad"=>$cantidad,
							"idpt"=>$idpt
						];
						$registraMovimiento = MovimientoModelo::registraDetalleMovimientoModelo($datosDetalleMovi);
						if($registraMovimiento->rowcount()>=1){
							$mensaje = $idMovimiento;
						}else{
							$eliminaMovimiento = MovimientoModelo::eliminaMovimientoModelo($contador);
							$mensaje = "<div class='alert alert-danger'>nnnnmnn</div>";	
						}
					}else{

						$mensaje = "<div class='alert alert-danger'>* Selecciona un tipo de movimiento</div>";
					}
				}else{
					//$codMovimiento = $codigoMovimiento;
					//echo $codigoMovimiento;
					$datosDetalleMovi=[
							"idMovimiento"=>$codigoMovimiento,
							"cantidad"=>$cantidad,
							"idpt"=>$idpt
						];
						$registraMovimiento = MovimientoModelo::registraDetalleMovimientoModelo($datosDetalleMovi);
						if($registraMovimiento->rowcount()>=1){
							$mensaje = $codigoMovimiento;
						}else{
							//$eliminaMovimiento = MovimientoModelo::eliminaMovimientoModelo($contador);
							$mensaje = "<div class='alert alert-danger'>Ocurrio un error tecnico intente nuevamente mas tarde</div>";	
						}
				}

			}else{
				$mensaje = "<div class='alert alert-danger'>El producto ingresado no esta registrado en el sistema</div>";
			}
			
		}else{
			$mensaje = "<div class='alert alert-danger'>Todos los campos de este formulario son obligatorios</div>";
		}
		return $mensaje;
	}


	public function listaDetaMovimientoControlador(){
    	$id = $_POST['id'];
        $sql = ModeloPrincipal::consultaSimple("SELECT * FROM vista_movimiento WHERE idmovimiento_fk='$id'");
        $sql->execute();
        foreach ($sql as $value){
            echo '      <tr>
                            <td class="mdl-data-table__cell--non-numeric">'.$value[2].'</td>
                            <td class="mdl-data-table__cell--non-numeric">'.$value[1].'</td>
                ';?>                
   		                    <td class="mdl-data-table__cell--non-numeric">              
                                <a href="javascript:;" style="height:300;" class="btn btn-success" data-toggle="modal" data-target="#actializaM" onclick="actualizaMovimiento('<?php echo $value[0] ?>', '<?php echo $value[1] ?>', '<?php echo $value[5] ?>');"><i class = "zmdi zmdi-edit"> </i></a>
                            </td>
                            <td class="mdl-data-table__cell--non-numeric">
                                <button style="height:300;" type="button" class="btn btn-danger" onclick="eliminaMovimiento('<?php echo $value[5] ?>');"><i class="zmdi zmdi-delete"></i></button>
                            </td>
                        </tr>
                <?php
        }        
    }

    public function actualizaMovimientoControlador(){
    	$idpt = $_POST['pt'];
    	$cantidad = $_POST['cantidad'];
    	$idMovimiento = $_POST['idmovimiento'];

    	if(trim($idpt)!="" && trim($cantidad)!=""){
    		$datosDetalleM=[
    			"idpt"=>$idpt,
    			"cantidad"=>$cantidad,
    			"idmovimiento"=>$idMovimiento
    		];
    		$actualizaM = MovimientoModelo::actualizaMovimientoModelo($datosDetalleM);
    		if($actualizaM->rowcount()>=1){
    			$mensaje = "<div class='alert alert-primary'>Actualizacion exitosa</div>";
    		}else{
    			$mensaje = "<div class='alert alert-danger'>No se pudo actualizar el movimiento</div>";
    		}
    	}else{
    		$mensaje = "<div class='alert alert-danger'>Campos obligatorios</div>";
    	}
    	return $mensaje;
    }

    public function eliminaMovimientoControlador(){
    	$idmovimiento = $_POST['idmovimiento'];
    	if(trim($idmovimiento) != ""){
    		$eliminaDetaMoviento = MovimientoModelo::eliminaDetaMovimientoModelo($idmovimiento);
    		
    		if ($eliminaDetaMoviento->rowcount()>=1) {
    			// $eliminaMoviento = MovimientoModelo::eliminaMovimientoModelo($contador);
    			// if ($eliminaMoviento->rowcount()==1) {
    				$mensaje = "<div class='alert alert-primary'>Movimiento eliminado exitosamente<div>";
    			// }else{	
    			// 	$mensaje = "<div class='alert alert-danger'>Ocurrio un error al eliminar movimiento intente nuevamente<div>";
    			// }
    			
    		}else{
    			$mensaje = "<div class='alert alert-danger'>Ocurrio un error al eliminar Detalle movimiento intente nuevamente<div>";
    		}
    	}else{
    		$mensaje = "<div class='alert alert-danger'>Asegurate de seleccionar un registro<div>";
    	}
    	return $mensaje;
    }
    //contar 
		public function datosMoviControlador($tipo, $id){
			return MovimientoModelo::datosCategoriaModelo($tipo, $id);
		}

}