

<?php 
	require_once "../core/configGeneral.php";
	if(isset($_POST['accion'])){

		//validacion para determinar si se registrara un usuario.
		if(@$_POST['accion']=="registraUsuario"){
			require_once "usuarioControlador.php";
			$usuarioC = new UsuarioControlador();
			echo $usuarioC->registraUsuarioControlador();
		}
		
		//validacion para determinar si se listaran usuarios 
		
		if(@$_POST['accion'] =="listaUsuarioU" && trim(@$_POST['doc'])!=""){
			require_once "usuarioControlador.php";
			$usuarioC = new UsuarioControlador();
			$usuarioC->listaUsuarioControlador("unico", trim($_POST['doc']));

		}else if(@$_POST['accion']=="listaUsuarioU" && trim(@$_POST['doc'])==""){
			require_once "usuarioControlador.php";
			$usuarioC = new UsuarioControlador();
			$usuarioC->listaUsuarioControlador("general", 0);
		}

		//validacion para determinar si se actualizara un usuario.
		if(@$_POST['accion']=="actualizaUsuario"){
			require_once "usuarioControlador.php";
			$usuarioC = new UsuarioControlador();
			echo $usuarioC->actualizaUsuarioControlador();
		}

		//validacion para eliminar usuario
		if(@$_POST['accion']=="eliminaUsuario"){
			require_once "usuarioControlador.php";
			$usuarioC = new UsuarioControlador();
			echo $usuarioC->eliminaUsuarioControlador();
		}
		//validacion para actalizar datos personales logueo
		if(@$_POST['accion']=="modificarDatos"){
			require_once "usuarioControlador.php";
			$usuarioC = new UsuarioControlador();
			echo $usuarioC->actualizaUsuarioLogueadoControlador();
		}

		//validacion para actualizar cuenta
		if(@$_POST['accion']=="actualizaCuenta"){
			require_once "usuarioControlador.php";
			$usuarioC = new UsuarioControlador();
			echo $usuarioC->actualizaCuentaControlador();
		}

		//validacion para determinar si se registrara una categoria.
		if(@$_POST['accion']=="registraCategoria"){
			require_once "categoriaControlador.php";
			$categoriaC = new CategoriaControlador();
			echo $categoriaC->registraCategoriaControlador();
		}
		
		//validacion para determinar si se listaran categoria
		if(@$_POST['accion'] =="listaCategoria" && trim(@$_POST['nom'])!=""){
			require_once "categoriaControlador.php";
			$categoriaC = new CategoriaControlador();
			$categoriaC->listaCategoriaControlador("unico", trim($_POST['nom']));

		}else if(@$_POST['accion']=="listaCategoria" && trim(@$_POST['nom'])==""){
			require_once "categoriaControlador.php";
			$categoriaC = new CategoriaControlador();
			$categoriaC->listaCategoriaControlador("general", 0);
		}
		//eliminar categoria
		if(@$_POST['accion']=="eliminaCategoria"){
			require_once "CategoriaControlador.php";
			$categoriaC = new CategoriaControlador();
			echo $categoriaC->eliminaCategoriaControlador();
		}
		
		//validacion para determinar si se actualizara una categoria.
		if(@$_POST['accion']=="actualizaCategoria"){
			require_once "categoriaControlador.php";
			$categoriaC = new CategoriaControlador();
			echo $categoriaC->actualizaCategoriaControlador();
		}






		//validacion para determinar si se registrara un Producto.
		if(@$_POST['accion']=="registraProducto"){
			require_once "productoControlador.php";
			$productoC = new ProductoControlador();
			echo $productoC->registraProductoControlador();
		}

		//validacion para determinar si se listaran Producto
		
		if(@$_POST['accion'] =="listaProducto" && trim(@$_POST['pt'])!=""){
			require_once "productoControlador.php";
			$productoC = new ProductoControlador();
			$productoC->listaProductoControlador("unico", trim($_POST['pt']));

		}else if(@$_POST['accion']=="listaProducto" && trim(@$_POST['pt'])==""){
			require_once "productoControlador.php";
			$usuarioC = new ProductoControlador();
			$usuarioC->listaProductoControlador("general", 0);
		}
		//validacion para determinar si se actualizara un Producto.
		if(@$_POST['accion']=="actualizaProducto"){
			require_once "productoControlador.php";
			$actividadC = new ProductoControlador();
			echo $actividadC->actualizaProductoControlador();
		}

		//validacion para eliminar Producto
		if(@$_POST['accion']=="eliminaProducto"){
			require_once "ProductoControlador.php";
			$productoC = new ProductoControlador();
			echo $productoC->eliminaProductoControlador();
		}







		//validacion para determinar si se registrara una actividad.
		if(@$_POST['accion']=="registraActividad"){
			require_once "actividadControlador.php";
			$actividadC = new ActividadControlador();
			echo $actividadC->registraActividadControlador();
		}

		//validacion para determinar si se listaran las actividades
		if(@$_POST['accion'] =="listaActividad" && trim(@$_POST['nom'])!=""){
			require_once "actividadControlador.php";
			$actividadC = new ActividadControlador();
			$actividadC->listaActividadControlador("unico", trim($_POST['nom']));

		}else if(@$_POST['accion']=="listaActividad" && trim(@$_POST['nom'])==""){
			require_once "actividadControlador.php";
			$actividadC = new ActividadControlador();
			$actividadC->listaActividadControlador("general", 0);
		}

		//validacion para determinar si se actualizara una Actividad.
		if(@$_POST['accion']=="actualizaActividad"){
			require_once "actividadControlador.php";
			$actividadC = new ActividadControlador();
			echo $actividadC->actualizaActividadControlador();
		}
		
		//validacion para eliminar Actividad
		if(@$_POST['accion']=="eliminaActividad"){
			require_once "ActividadControlador.php";
			$actividadC = new ActividadControlador();
			echo $actividadC->eliminaActividadControlador();
		}

		if(@$_POST['accion']=="registraMovimiento"){
			require_once "movimientoControlador.php";
			$movimientoC = new MovimientoControlador();
			echo $movimientoC->registraMovimientoControlador();
		}

	  	if(@$_POST['accion']=="listaDetaMovimiento"){
            require_once "movimientoControlador.php";
            $movimientoC = new MovimientoControlador();
            $movimientoC->listaDetaMovimientoControlador();
        }

		if(@$_POST['accion']=="actualizaMovimiento"){
            require_once "movimientoControlador.php";
            $movimientoC = new MovimientoControlador();
            echo $movimientoC->actualizaMovimientoControlador();
        }

        if(@$_POST['accion']=="eliminaMovimiento"){
            require_once "movimientoControlador.php";
            $movimientoC = new MovimientoControlador();
            echo $movimientoC->eliminaMovimientoControlador();
        }

        //validar consulta de movimiento
        if(@$_POST['accion']=="consultaMovimiento"){
        	require_once "inventarioControlador.php";
        	$inventarioC = new InventarioControlador();
        	if(trim(@$_POST['idmovimiento'])!=""){
        		$inventarioC->listaControlador('unico', trim(@$_POST['idmovimiento']));
        	}else
        	if(trim(@$_POST['idmovimiento'])==""){
        		$inventarioC->listaControlador('general', '');
        	}
        }

        
        if(@$_POST['accion']=="registraCarga"){
            require_once "pagoControlador.php";
            $movimientoC = new PagoControlador();
            echo $movimientoC->registraTrabajoControlador();
        }


	
	}else if(isset($_GET['accion'])){
		//Valiar la salida del sistema.
		if(@$_GET['accion']=="salir"){
			require_once "loginControlador.php";
			$loginC = new LoginControlador();
			echo $loginC->cerrarSesionControlador();
		}
	}else{
		session_start();
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'" </script>';
	}

	
	
