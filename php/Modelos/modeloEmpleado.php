<?php
	include_once ("../sesiones.php");
    require_once("modeloAbstractoDB.php");
    class gesEmpleado extends ModeloAbstractoDB {
		private $empleado_cod;
        private $empleado_nomb;
		private $empleado_cargo;
        private $empleado_oficina;
		private $empleado_ciudad;
		private $empleado_pais;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getEmpleado_cod(){ return $this->empleado_cod; }

		public function getEmpleado_nomb(){ return $this->empleado_nomb; }
        
        public function getEmpleado_cargo(){ return $this->empleado_cargo; }

        public function getEmpleado_pais(){ return $this->empleado_pais; }

        public function getEmpleado_ciudad(){ return $this->empleado_ciudad; }

        public function getEmpleado_oficina(){ return $this->empleado_oficina; }


		public function consultar($empleado_cod='') {
			if($empleado_cod !=''):
				$this->query = "
				SELECT empleado_cod, empleado_nomb, empleado_cargo, empleado_oficina, empleado_ciudad, empleado_pais 
				FROM dt_empleado
				WHERE empleado_cod = '$empleado_cod' order by empleado_cod
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}
		
		public function lista() {
			$this->query = "
			SELECT c.empleado_cod, c.empleado_nomb, c.empleado_cargo, s.sede_nomb, d.ciudad_nomb , p.pais_nomb 
			FROM dt_empleado as c inner join dt_pais as p inner join dt_ciudad as d inner join dt_sede as s
			ON (c.empleado_pais = p.pais_cod and c.empleado_ciudad = d.ciudad_cod and c.empleado_oficina = s.sede_cod)
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}

		
		public function nuevo($datos=array()) {
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
                endforeach;
                $hciudad = 1;
                $hsede = 1;
				$this->query = "
					INSERT INTO dt_empleado
					(empleado_cod,empleado_nomb,empleado_cargo,empleado_oficina,empleado_ciudad,empleado_pais)
					VALUES
					(NULL,'$eempleadon','$ecargon', '$eseden','$eciudadn','$epaisn')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			//$empleado_nomb= utf8_decode($hpaciente);
			$this->query = "
			UPDATE dt_empleado
			SET empleado_nomb='$eempleado',
			empleado_cargo='$ecargo',
			empleado_pais='$epais',
			empleado_ciudad='$eciudad',
			empleado_oficina='$esede'
			WHERE empleado_cod = '$ecodigo'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($empleado_cod='') {
			$this->query = "
			DELETE FROM dt_empleado
			WHERE empleado_cod = '$empleado_cod'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>