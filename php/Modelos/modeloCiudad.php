<?php
	include_once ("../sesiones.php");
    require_once("modeloAbstractoDB.php");
    class Ciudad extends ModeloAbstractoDB {
		private $ciudad_cod;
		private $ciudad_nomb;
		private $pais_cod;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getCiudad_cod(){
			return $this->ciudad_cod;
		}

		public function getCiudad_nomb(){
			return $this->ciudad_nomb;
		}

		public function getPais_cod(){
			return $this->pais_cod;
		}
		
		public function consultar($ciudad_cod='') {
			if($ciudad_cod !=''):
				$this->query = "
				SELECT ciudad_cod, ciudad_nomb, pais_cod
				FROM dt_ciudad
				WHERE ciudad_cod = '$ciudad_cod' order by ciudad_cod
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}

		public function nuevo($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
				INSERT INTO dt_ciudad
				(ciudad_cod,ciudad_nomb,pais_cod)
				VALUES
				(NULL,'$cciudade', '$cpaise')
				";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}

		public function lista() {
			$this->query = "
			SELECT c.ciudad_cod, c.ciudad_nomb, p.pais_nomb
			FROM dt_ciudad as c inner join dt_pais as p
			ON (c.pais_cod = p.pais_cod)
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}

		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE dt_ciudad
			SET ciudad_nomb='$cciudad',
			pais_cod='$cpais'
			WHERE ciudad_cod = '$ccodigo'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}

		public function borrar($ciudad_cod='') {
			$this->query = "
			DELETE FROM dt_ciudad
			WHERE ciudad_cod = '$ciudad_cod'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
	}
?>