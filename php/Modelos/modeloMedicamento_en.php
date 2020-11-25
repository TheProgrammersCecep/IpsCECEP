<?php
    require_once("modeloAbstractoDB.php");
    class gesMedicamentoEn extends ModeloAbstractoDB {
		private $formula_id;
        private $paciente_nomb;
        private $paciente_cedula;
		private $medicamentos;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getMedic_formula(){ return $this->formula_id; }

		public function getMedic_usuario(){ return $this->paciente_nomb; }

        public function getMedic_cedula(){ return $this->paciente_cedula; }

        public function getMedic_medic(){ return $this->medicamentos; }


		public function consultar($formula_id='') {
			
			if($formula_id !=''):
				$this->query = "
				SELECT formula_id, medicamentos, paciente_cedula, paciente_nomb 
				FROM dt_his_medicamento
				WHERE formula_id = '$formula_id'
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
			SELECT formula_id, paciente_cedula, paciente_nomb, medicamentos
			FROM dt_his_medicamento
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}


		public function listaIMP($formula_id='') {
			
			$this->query = "
			SELECT formula_id, paciente_cedula, paciente_nomb, medicamentos
			FROM dt_his_medicamento
			WHERE formula_id = '$formula_id'
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}

		public function nuevo() {}

		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE dt_his_medicamento
			SET formula_id='$mcformula',
			medicamentos='$mcmedic',
			paciente_cedula='$mccedula',
			paciente_nomb='$mcusuario'
			WHERE formula_id = '$mcformula'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($formula_id='') {
			$this->query = "
			DELETE FROM dt_his_medicamento
			WHERE formula_id = '$formula_id'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>