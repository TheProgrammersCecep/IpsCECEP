<?php
    require_once("modeloAbstractoDB.php");
    class Pais extends ModeloAbstractoDB {
		private $pais_cod;
		private $pais_nomb;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getPais_cod(){
			return $this->pais_cod;
		}

		public function getPais_nomb(){
			return $this->pais_nomb;
		}
		
		public function consultar($pais_cod='') {
			if($pais_cod !=''):
				$this->query = "
				SELECT pais_cod, pais_nomb
				FROM dt_pais
				WHERE pais_cod = '$pais_cod' order by pais_cod
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
				INSERT INTO dt_pais
				(pais_cod,pais_nomb)
				VALUES
				(NULL,'$ppaise')
				";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}

		public function lista() {
			$this->query = "
			SELECT pais_cod, pais_nomb
			FROM dt_pais
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}

		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE dt_pais
			SET pais_nomb='$ppais'
			WHERE pais_cod = '$pcodigo'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}

		public function borrar($pais_cod='') {
			$this->query = "
			DELETE FROM dt_pais
			WHERE pais_cod = '$pais_cod'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
	}
?>