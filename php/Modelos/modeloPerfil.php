<?php
	include_once ("../sesiones.php");
    require_once("modeloAbstractoDB.php");
    class gesPerfil extends ModeloAbstractoDB {

		function __construct() {
			//$this->db_name = '';
		}

		public function consultar() {
		}
		
		public function lista() {
		}
		
		public function nuevo() {
		}
		
		public function editar($datos=array()) {

			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;

			$user = $_SESSION["usuario"];

			if($pnueva=="") {
				$pnueva = $_SESSION["pass"];
			}

			//$empleado_nomb= utf8_decode($hpaciente);
			$this->query = "
			UPDATE dt_usuario
			SET usua_nombre='$pnombre',
			usua_cedula='$pcedula',
			usua_cel='$pcelular',
			correo='$pcorreo',
			usua_pass='$pnueva'
			WHERE usuario = '$user'
			";

			$_SESSION['pass'] = $pnueva;
			$_SESSION['nombre'] = $pnombre;
			$_SESSION['cedula'] = $pcedula;
			$_SESSION['correo'] = $pcorreo;
			$_SESSION['celular'] = $pcelular;

			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar() {
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>