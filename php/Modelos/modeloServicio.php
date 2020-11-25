<?php
    require_once("modeloAbstractoDB.php");
    class Servicio extends ModeloAbstractoDB {
		private $ser_cod;
		private $ser_nombre;
		private $ser_descripcion;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getServicio_cod(){
			return $this->ser_cod;
		}

		public function getServicio_nomb(){
			return $this->ser_nombre;
		}

		public function getServicio_desc(){
			return $this->ser_descripcion;
		}
		
		public function consultar($ser_cod='') {
			if($ser_cod !=''):
				$this->query = "
				SELECT ser_cod, ser_nombre, ser_descripcion
				FROM dt_servicios
				WHERE ser_cod = '$ser_cod' order by ser_cod
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
				INSERT INTO dt_servicios
				(ser_cod,ser_nombre,ser_descripcion)
				VALUES
				(NULL,'$sservicion','$sdescn')
				";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}

		public function lista() {
			$this->query = "
			SELECT ser_cod, ser_nombre, ser_descripcion
			FROM dt_servicios
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}

		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE dt_servicios
			SET ser_nombre='$sservicio',
			ser_descripcion='$sdesc'
			WHERE ser_cod = '$scodigo'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}

		public function borrar($ser_cod='') {
			$this->query = "
			DELETE FROM dt_servicios
			WHERE ser_cod = '$ser_cod'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
	}
?>