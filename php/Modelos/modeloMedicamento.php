<?php
	include_once ("../sesiones.php");
    require_once("modeloAbstractoDB.php");
    class gesMedicamento extends ModeloAbstractoDB {
		private $medic_cod;
        private $medic_nomb;
        private $medic_desc;
		private $medic_can;
		private $medic_fechav;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getMedic_cod(){ return $this->medic_cod; }

		public function getMedic_nomb(){ return $this->medic_nomb; }

        public function getMedic_fechav(){ return $this->medic_fechav; }

        public function getMedic_can(){ return $this->medic_can; }

        public function getMedic_desc(){ return $this->medic_desc; }


		public function consultar($medic_cod='') {
			if($medic_cod !=''):
				$this->query = "
				SELECT medic_cod, medic_nomb, medic_desc, medic_can, medic_fechav 
				FROM dt_medicamentos
				WHERE medic_cod = '$medic_cod' order by medic_cod
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
			SELECT medic_cod, medic_nomb, medic_desc, medic_can, medic_fechav
			FROM dt_medicamentos
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
					INSERT INTO dt_medicamentos
					(medic_cod,medic_nomb,medic_desc,medic_can,medic_fechav)
					VALUES
					(NULL,'$mdmedicamenton','$mddescn','$mdcann','$mdfechavn')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
		}


		public function nuevar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;

			$grupom = "";
			switch($cantidad)
			{
				case 1:
					$grupom = $rmedic1 . " : " . $canm1 ;
				break;
				case 2:
					$grupom = $rmedic1 . " : " . $canm1 . ", " . $rmedic2 . " : " . $canm2;
				break;
				case 3:
					$grupom = $rmedic1 . " : " . $canm1 . ", " . $rmedic2 . " : " . $canm2 . ", " . $rmedic3 . " : " . $canm3;
				break;
				case 4:
					$grupom = $rmedic1 . " : " . $canm1 . ", " . $rmedic2 . " : " . $canm2 . ", " . $rmedic3 . " : " . $canm3 . ", " . $rmedic4 . " : " . $canm4;
				break;
			}
			
			$this->query = "
				INSERT INTO dt_his_medicamento
				(formula_id,medicamentos,paciente_cedula,paciente_nomb)
				VALUES
				(NULL,'$grupom','$rcedula','$rpaciente')
				";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
	}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE dt_medicamentos
			SET medic_nomb='$mdmedicamento',
			medic_fechav='$mdfechav',
			medic_can='$mdcan',
			medic_desc='$mddesc'
			WHERE medic_cod = '$mdcodigo'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($medic_cod='') {
			$this->query = "
			DELETE FROM dt_medicamentos
			WHERE medic_cod = '$medic_cod'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>