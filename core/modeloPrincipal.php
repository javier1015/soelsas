<?php 
	class ModeloPrincipal{
		
		private $server;
		private $db;
		private $user;
		private $pass;

		function __construct(){
			$this->server = "localhost";
			$this->db 	  = "proyecto";
			$this->user   = "root";
			$this->pass   = "";
		}

		function conectardb(){
			try{
				$conexion = new PDO("mysql:host=".$this->server.";dbname=".$this->db, $this->user, $this->pass);
				return $conexion;
			}catch(Exception $e){
				echo "Error de conexion";
			}
		}

		function consultaSimple($query){
			$sql = self::conectardb()->prepare($query);
			$sql->execute();
			return $sql;
		}

		public function listaTipoDoc(){
			$query = "SELECT * FROM tipodocumento";
			$sql = self::conectardb()->prepare($query);
			$sql->execute();
			echo "<option value='0'>Seleccionar tipo documento</option>";
			foreach ($sql as $val)
				echo "<option value=$val[0]>$val[1]</option>";
		}

		public function listaRol(){
			$query = "SELECT * FROM rol";
			$sql = self::conectardb()->prepare($query);
			$sql->execute();
			echo "<option value='0'>Rol</option>";
			foreach ($sql as $val)
				echo "<option value='$val[0]'>$val[1]</option>";
		}

		public function listaActividad(){
			$query = "SELECT * FROM actividad WHERE estadoActividad ='activo'";
			$sql = self::conectardb()->prepare($query);
			$sql->execute();
			echo "<option value='0'>Seleccionar actividad</option>";
			foreach ($sql as $val)
				echo "<option value='$val[0]'>$val[1]</option>";
		}		
		

		public function generarCodigo($letra, $longitud, $num){
			for ($i=1; $i <=$longitud; $i++) { 
				$numero = rand(0,9);
				$letra.=$numero;
			}
			return $letra.$num;
		}

		public function listaTipoCate(){
			$query = "SELECT * FROM categoria WHERE estado = 'activo'";
			$sql = self::conectardb()->prepare($query);
			$sql->execute();
			echo "<option id='e' value='0'>Seleccionar categoria</option>";
			foreach ($sql as $val)
				echo "<option value=$val[0]>$val[1]</option>";
		}

		//lista tipo de movimiento
		public function listaTipoMovimiento(){
			$sql = self::conectardb()->prepare("SELECT * FROM tipomovimiento");
			$sql->execute();
			echo "<option id='e' value='0'>Seleccionar movimiento</option>";
			foreach ($sql as $val) 
				echo "<option value='$val[0]'>$val[1]</option>";
		}
		//lista tipo de movimiento
		public function listaCargaTrabajo(){
			$sql = self::conectardb()->prepare("SELECT docusuario1_fk, nombreUsuario, apellidoUsuario FROM detalleusuario");
			$sql->execute();
			echo "<option id='e' value='0'>Seleccionar empleado</option>";
			foreach ($sql as $val) 
				echo "<option value='$val[0]'>$val[1] $val[2] </option>";
		}
	}