<?php
	include_once ("../sesiones.php");
    require_once("modeloAbstractoDB.php");
    class gesMedico extends ModeloAbstractoDB {
		private $medico_cod;
        private $medico_nomb;
        private $medico_sede;
		private $medico_ciudad;
		private $medico_pais;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getMedico_cod(){ return $this->medico_cod; }

		public function getMedico_nomb(){ return $this->medico_nomb; }
        
        public function getMedico_cargo(){ return $this->medico_cargo; }

        public function getMedico_pais(){ return $this->medico_pais; }

        public function getMedico_ciudad(){ return $this->medico_ciudad; }

        public function getMedico_sede(){ return $this->medico_sede; }


		public function consultar($medico_cod='') {
			if($medico_cod !=''):
				$this->query = "
				SELECT medico_cod, medico_nomb, medico_sede, medico_ciudad, medico_pais 
				FROM dt_medico
				WHERE medico_cod = '$medico_cod' order by medico_cod
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
			SELECT c.medico_cod, c.medico_nomb, s.sede_nomb, d.ciudad_nomb , p.pais_nomb 
			FROM dt_medico as c inner join dt_pais as p inner join dt_ciudad as d inner join dt_sede as s
			ON (c.medico_pais = p.pais_cod and c.medico_ciudad = d.ciudad_cod and c.medico_sede = s.sede_cod)
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
					INSERT INTO dt_medico
					(medico_cod,medico_nomb,medico_sede,medico_ciudad,medico_pais)
					VALUES
					(NULL,'$mmedicon','$mseden','$mciudadn','$mpaisn')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			//$medico_nomb= utf8_decode($hpaciente);
			$this->query = "
			UPDATE dt_medico
			SET medico_nomb='$mmedico',
			medico_pais='$mpais',
			medico_ciudad='$mciudad',
			medico_sede='$msede'
			WHERE medico_cod = '$mcodigo'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($medico_cod='') {
			$this->query = "
			DELETE FROM dt_medico
			WHERE medico_cod = '$medico_cod'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>