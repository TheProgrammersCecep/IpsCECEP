<?php
    require_once("modeloAbstractoDB.php");
	
    class Usuario extends ModeloAbstractoDB {
        private $usua_codigo;
        private $usuario;
		private $usua_nombre;
        private $usua_pass;
        private $usua_tipo;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getUsua_codigo(){
			return $this->usua_codigo;
		}

        
        public function getUsuario(){
			return $this->usuario;
		}

		public function getUsua_nombre(){
			return $this->usua_nombre;
		}

		
		public function getUsua_pass(){
			return $this->usua_pass;
        }
        
        public function getUsua_tipo(){
			return $this->usua_tipo;
		}

		
		public function consultar($datos = array()) {
			
			$usuario = $datos['usuario'];
			$password = $datos['password'];
            $this->query = "
            SELECT usua_codigo, usuario, usua_pass, usua_nombre, usua_tipo
			FROM dt_usuario 
			WHERE usuario = '$usuario'
			";

            $this->obtener_resultados_query();
			
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}
		
        
        public function generarPassword($pass=""){
            $opciones = [
                'cost' => 12,
            ];
            
            $passwordHashed = password_hash($pass, PASSWORD_BCRYPT, $opciones);
            
            return $passwordHashed;
        }

		public function nuevo($datos=array()) {
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
                endforeach;
              
				$this->query = "
					INSERT INTO dt_usuario
					(usua_codigo, usuario, usua_nombre, usua_foto, usua_pass, update_at)
					VALUES
					(NULL, '$usuario','$nombre','avatar5.png','$password',NULL,NULL)
					";
					$resultado = $this->ejecutar_query_simple();
					return $resultado;
			
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>