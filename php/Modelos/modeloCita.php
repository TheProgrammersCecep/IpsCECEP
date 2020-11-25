<?php
	include_once ("../sesiones.php");
    require_once("modeloAbstractoDB.php");
    class crearCita extends ModeloAbstractoDB {
		private $usua_codigo;
        private $usuario;
		private $usua_nombre;
        private $usua_pass;
		private $usua_tipo;
		private $usua_cedula;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getHis_cod(){ return $this->his_cod; }

		public function getHis_paciente_cod(){ return $this->his_paciente_cod; }

		public function getHis_paciente(){ return $this->his_paciente; }
		
        public function getHis_cedula(){ return $this->his_cedula; }
        
        public function getHis_fecha(){ return $this->his_fecha; }

        public function getHis_hora(){ return $this->his_hora; }

        public function getHis_pais(){ return $this->his_pais; }

        public function getHis_ciudad(){ return $this->his_ciudad; }

		public function getHis_sede(){ return $this->his_sede; }
		
		public function getHis_medico(){ return $this->his_medico; }

		public function getHis_asesor(){ return $this->his_asesor; }

		public function getHis_servicio(){ return $this->his_servicio; }

		public function getHis_desc(){ return $this->descripcion; }


		public function consultar($his_cod='') {
			if($his_cod !=''):
				$this->query = "
				SELECT his_cod, his_paciente_cod, his_paciente, his_cedula, his_fecha, his_hora, his_medico, his_asesor, his_servicio, descripcion, his_pais, his_ciudad, his_sede
				FROM dt_historial_cita
				WHERE his_cod = '$his_cod' order by his_cod
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
			$usua_codigo = $_SESSION["codigo"];
			$this->query = "
			SELECT c.his_cod, c.his_paciente, c.his_cedula, c.his_fecha, c.his_hora, m.medico_nomb, a.asesor_nomb, sv.ser_nombre, c.descripcion, s.sede_nomb
			FROM dt_historial_cita as c
			inner join dt_sede as s ON (c.his_sede = s.sede_cod)
			inner join dt_medico as m ON (c.his_medico = m.medico_cod)
			inner join dt_servicios as sv ON (c.his_servicio = sv.ser_cod)
			inner join dt_asesor as a ON (c.his_asesor = a.asesor_cod)
            WHERE c.his_paciente_cod = '$usua_codigo'
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}

		public function listaHistorial() {
			$this->query = "
			SELECT c.his_cod, c.his_paciente, c.his_cedula, c.his_fecha, c.his_hora, m.medico_nomb, a.asesor_nomb, sv.ser_nombre, c.descripcion, s.sede_nomb
			FROM dt_historial_cita as c 
			inner join dt_sede as s ON (c.his_sede = s.sede_cod)
			inner join dt_medico as m ON (c.his_medico = m.medico_cod)
			inner join dt_servicios as sv ON (c.his_servicio = sv.ser_cod)
			inner join dt_asesor as a ON (c.his_asesor = a.asesor_cod)
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
                endforeach;
				$this->query = "
					INSERT INTO dt_historial_cita
					(his_cod,his_paciente_cod,his_paciente,his_cedula,his_fecha,his_hora,his_medico,his_servicio,his_asesor,descripcion,his_pais,his_ciudad,his_sede)
					VALUES
					(NULL,'$hnombreCod','$hnombre', '$hcedula','$hfecha','$hhora','$hmedico','$hservicio','$hasesor','$hdesc','$hpais','$hciudad','$hsede')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			//$his_paciente= utf8_decode($hpaciente);
			$this->query = "
			UPDATE dt_historial_cita
			SET his_paciente='$hpaciente',
			his_fecha='$hfecha',
			his_hora='$hhora',
			his_medico='$hmedico',
			his_servicio='$hservicio',
			his_asesor='$hasesor',
			descripcion='$hdesc',
			his_pais='$hpais',
			his_ciudad='$hciudad',
			his_sede='$hsede'
			WHERE his_cod = '$hcod'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($his_cod='') {
			$this->query = "
			DELETE FROM dt_historial_cita
			WHERE his_cod = '$his_cod'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>