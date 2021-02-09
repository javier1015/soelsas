<?php 

require_once "../../modelo/trabajoModelo.php";
class TrabajoControlador extends ModeloPrincipal
{
	public function listaTrabajosControlador(){
		$pt =  array();
		$ingreso = array();
		$egreso = array();
		$total =  array();
		$pto = ModeloPrincipal::consultaSimple("SELECT * FROM producto WHERE estadoProducto='activo'");

		$cont=0;
		while ($row = $pto->fetch()) {
		   $pt[$cont] = $row['idProducto'];
		   $cont++;
		}
		$cont=0;
		foreach ($pt as $valor) {
        	$valor;
			$totalIngreso = ModeloPrincipal::consultaSimple("SELECT SUM(d.cantidad) as total 
			FROM movimiento m INNER JOIN detallemovimiento d on m.idmovimiento = d.idmovimiento_fk 
			INNER JOIN producto p on p.idProducto = d.idProducto  WHERE d.idProducto = '$valor' and m.idtipoMovimiento = 1 and p.estadoProducto = 'activo'");
			$Ingreso = $totalIngreso->fetch();

			if($totalIngreso->rowcount()==1){
				$tota = (int) $Ingreso['total'];
				$ingreso[$cont] = $tota;
		  		
			}else{
				$ingreso[$cont] = 0;
			}

			$totalEgreso = ModeloPrincipal::consultaSimple("SELECT SUM(d.cantidad) as total
			FROM movimiento m INNER JOIN detallemovimiento d on m.idmovimiento = d.idmovimiento_fk 
			INNER JOIN producto p on p.idProducto = d.idProducto  WHERE d.idProducto = '$valor' and m.idtipoMovimiento = 2 and p.estadoProducto = 'activo'");
			$Egreso = $totalEgreso->fetch(); 

			if($totalEgreso->rowcount()==1){
				$tota = (int) $Egreso['total'];
				$egreso[$cont] = $tota;

			}else{
				$egreso[$cont] = 0;
			}
		  	$cont++;
		}

		$numero = count($pt);
		for ($i=0; $i <= $numero ; $i++) {
			@$total[$i] = @$ingreso[$i] - @$egreso[$i];
		}
		

		for ($i=0; $i <$numero ; $i++) {
			@$datos = ModeloPrincipal::consultaSimple("SELECT * FROM producto WHERE idProducto='$pt[$i]'"); 
			@$registro=$datos->fetch();
			echo '<tr>
					<td class="mdl-data-table__cell--non-numeric">'.@$pt[$i].'</td>
					<td class="mdl-data-table__cell--non-numeric">'.@$registro['nombreProducto'].'</td>
			    	<td class="mdl-data-table__cell--non-numeric">'.@$total[$i].'</td>
				</tr>';
		}
	}
}