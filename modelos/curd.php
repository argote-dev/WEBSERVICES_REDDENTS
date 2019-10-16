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

	    public function getFilas()
	    {
	        return $this->filas;
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

    	public function setFilas($filas)
    	{
    	    $this->filas = $filas;
    	}


	}

?>