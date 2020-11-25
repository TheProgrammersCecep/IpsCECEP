<?php
    require_once("modeloAbstractoDB.php");
    class Asesor extends ModeloAbstractoDB {
		private $asesor_cod;
		private $asesor_nomb;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getAsesor_cod(){
			return $this->asesor_cod;
		}

		public function getAsesor_nomb(){
			return $this->asesor_nomb;
		}
		
		public function consultar($asesor_cod='') {
			if($asesor_cod !=''):
				$this->query = "
				SELECT asesor_cod, asesor_nomb
				FROM dt_asesor
				WHERE asesor_cod = '$asesor_cod' order by asesor_cod
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
				INSERT INTO dt_asesor
				(asesor_cod,asesor_nomb)
				VALUES
				(NULL,'$aasesorn')
				";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}

		public function lista() {
			$this->query = "
			SELECT asesor_cod, asesor_nomb
			FROM dt_asesor
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}

		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE dt_asesor
			SET asesor_nomb='$aasesor'
			WHERE asesor_cod = '$acodigo'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}

		public function borrar($asesor_cod='') {
			$this->query = "
			DELETE FROM dt_asesor
			WHERE asesor_cod = '$asesor_cod'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
	}
?>