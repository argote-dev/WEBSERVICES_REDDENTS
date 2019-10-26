<?php 
	
	require_once 'conexion.php';


	/**
	 * Clase con la que se va a ejecutar cada uno de los crud
	 */
	class Crud
	{
		private $tablas;
		private $campos;
		private $expresion;
		private $condicion;
		private $agrupamiento;
		private $ordenamiento;
		private $valores;
		private $filas; 

		

	    /**
	     * Metodo Constructor
	     */
	    public function __construct()
	    {
	       	$this->tablas = null;
			$this->campos = null;
			$this->valores = null;
			$this->filas = null;
			$this->expresion = null;
			$this->condicion = null;
			$this->ordenamiento = null;
			$this->agrupamiento = null;
			$this->filas = null; 
	    }


	    /**
	     * Metodos Get de los atributos
	     */

	    public function getTablas()
	    {
	        return $this->tablas;
	    }

	    public function getCampos()
	    {
	        return $this->campos;
	    }

	    public function getValores()
	    {
	        return $this->valores;
	    }

	    public function getFilas()
	    {
	        return $this->filas;
	    }

	    public function getExpresion()
	    {
	        return $this->expresion;
	    }

	    public function getCondicion()
	    {
	        return $this->condicion;
	    }

	    public function getOrdenamiento()
	    {
	        return $this->ordenamiento;
	    }

	    public function getAgrupamiento()
	    {
	        return $this->agrupamiento;
	    }

	    /**
	     * Metodos Set de los atributos
	     */

	    public function setTablas($tablas)
	    {
	        $this->tablas = $tablas;
	    }

	    public function setCampos($campos)
	    {
	        $this->campos = $campos;
	    }

	    public function setValores($valores)
	    {
	        $this->valores = $valores;
	    }

	    public function setFilas($filas)
	    {
	        $this->filas = $filas;
	    }

	    public function setExpresion($expresion)
	    {
	        $this->expresion = $expresion;
	    }

	    public function setCondicion($condicion)
	    {
	        $this->condicion = $condicion;
	    }

	    public function setOrdenamiento($ordenamiento)
	    {
	        $this->ordenamiento = $ordenamiento;
	    }

    	public function setAgrupamiento($agrupamiento)
    	{
    	    $this->agrupamiento = $agrupamiento;
    	}	

    	/**
	     * Metodopara insertar
	     */

    	public function create(){

			$tablas = $this->tablas;
			$campos = $this->campos;
			$valores = $this->valores;

			$objconexion = new conexion();
			$idenlace = $objconexion->conectar();
			

			$sSQL = "INSERT INTO $tablas($campos) VALUES ($valores)";

			$pst = $idenlace ->prepare($sSQL);

			$resultado = $pst->execute();

			return $resultado;
		}

		public function read(){
			$tabla = $this->tablas;
			$expresion = $this->expresion;
			$condicion = $this->condicion;
			$agrupamiento = $this->agrupamiento;
			$ordenamiento = $this->ordenamiento;

			$sSQL = "SELECT $expresion FROM $tabla ";


			if (isset($condicion)) {
				$sSQL = $sSQL ." WHERE $condicion";
			}

			if (isset($agrupamiento)) {
				$sSQL = $sSQL." GROUP BY $agrupamiento";
			}

			if (isset($ordenamiento)) {
				$sSQL = $sSQL. " ORDER BY $ordenamiento";
			}

			//echo $sSQL;

			$objconexion = new conexion();
			$idenlace = $objconexion->conectar();

			$pst = $idenlace->prepare($sSQL);
			$pst -> execute();

			$numfil  = $pst->rowCount();

			if ($numfil>0) {
				
				//recorre los registros de un arreglo asociativo donde se devuelve el nombre de los campos de la tabla como un indice y se muestra en un arreglo con la funcion FETH_ASSOC

				while ($registro=$pst->fetch(PDO::FETCH_ASSOC)) {
				    $this->filas[]=$registro;
				}

				return $this->filas;
			}

			return $numfil;
		}

		// Metodo delete()

 		public function delete(){ 
 			$tablas = $this->tablas;
 			$condicion = $this->condicion;
 			
			$sSQL = "DELETE FROM $tablas WHERE $condicion";

			$objconexion = new conexion();
			$idenlace = $objconexion->conectar();

			$pst = $idenlace->prepare($sSQL);
			$resultado = $pst -> execute();

			return $resultado;			
 		}

 		// Metodo update()

 		public function update(){
 			$tablas = $this->tablas;
 			$campos =$this->campos;
 			$condicion = $this->condicion;
			$sSQL = "UPDATE $tablas SET $campos WHERE $condicion";
			//echo $sSQL;

			$objconexion = new conexion();
			$idenlance = $objconexion->conectar();

			$pst = $idenlance->prepare($sSQL);
			$resultado = $pst -> execute();

			return $resultado;
 		}


	}

?>