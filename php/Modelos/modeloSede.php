<?php
	include_once ("../sesiones.php");
    require_once("modeloAbstractoDB.php");
    class Sede extends ModeloAbstractoDB {
		private $sede_cod;
		private $sede_nomb;
		private $ciudad_cod;
		private $pais_cod;
		private $sede_dir;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getSede_cod(){
			return $this->sede_cod;
		}

		public function getSede_nomb(){
			return $this->sede_nomb;
		}

		public function getCiudad_cod(){
			return $this->ciudad_cod;
		}

		public function getPais_cod(){
			return $this->pais_cod;
		}

		public function getSede_dir(){
			return $this->sede_dir;
		}
		
		public function consultar($sede_cod='') {
			if($sede_cod !=''):
				$this->query = "
				SELECT sede_cod, sede_nomb, sede_dir, ciudad_cod, pais_cod
				FROM dt_sede
				WHERE sede_cod = '$sede_cod' order by sede_cod
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
				INSERT INTO dt_sede
				(sede_cod,sede_nomb,sede_dir, ciudad_cod, pais_cod)
				VALUES
				(NULL,'$ssedee','$sdire','$sciudade','$spaise')
				";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}

		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE dt_sede
			SET sede_nomb='$ssede',
				sede_dir='$sdir',
				ciudad_cod='$sciudad',
				pais_cod='$spais'
			WHERE sede_cod = '$scodigo'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}

		public function borrar($sede_cod='') {
			$this->query = "
			DELETE FROM dt_sede
			WHERE sede_cod = '$sede_cod'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function lista() {
			$this->query = "
			SELECT s.sede_cod, s.sede_nomb, s.sede_dir, c.ciudad_nomb, p.pais_nomb
			FROM dt_sede as s inner join dt_pais as p inner join dt_ciudad as c
			ON (s.pais_cod = p.pais_cod and s.ciudad_cod = c.ciudad_cod)
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
	}
?>