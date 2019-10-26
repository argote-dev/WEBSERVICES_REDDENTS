<?php


class Conexion 
{	
	private $servidor;
	private $usuario;
	private $clave;
	private $dbname;

	function __construct()
	{
		$this->servidor = "localhost";
		$this->usuario = "root";
		$this->clave = "";
		$this->dbname = "reddents";
	}

	public function conectar(){
		
		$idconexion = null;

		try{
			$idconexion = new PDO("mysql:host=$this->servidor; dbname=$this->dbname;
				charset=UTF8", $this->usuario, $this->clave);
			//echo "conecto";
			return $idconexion;
		}
		catch(PDOException $ex){
				echo "Error de conexion".$ex->getMessage()."<br>";
				echo "Contacte con el Administrador de la base de datos<br>";

			die();
		}

		
	}
}

?>