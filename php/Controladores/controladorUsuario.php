<?php
require_once '../Modelos/modeloUsuario.php';

$usuario = htmlspecialchars(trim("$_POST[usuario]"));
$password = htmlspecialchars(trim("$_POST[password]"));


switch ($_POST['accion']){
   
    case 'login':
        $datos = array("usuario"=>$usuario, "password"=>$password);
        $usuario = new Usuario();
        $usuario->consultar($datos);

        if($usuario->getUsua_codigo() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            if($datos['password']==$usuario->getUsua_pass()){
                session_start();
                $_SESSION['pass'] = $usuario->getUsua_pass();
                $_SESSION['codigo'] = $usuario->getUsua_codigo();
                $_SESSION['usuario'] = $usuario->getUsuario();
                $_SESSION['nombre'] = $usuario->getUsua_nombre();
                $_SESSION['tipo'] = $usuario->getUsua_tipo();
                $_SESSION['cedula'] = $usuario->getUsua_cedula();
                $_SESSION['correo'] = $usuario->getUsua_correo();
                $_SESSION['celular'] = $usuario->getUsua_cel();
                $respuesta = array(
                    'respuesta' =>'existe'
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            }
            
        }
        echo json_encode($respuesta);
        break;
    break;
    case 'editar':
        $usuario = new Usuario();
        $resultado = $usuario->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $nombre = htmlspecialchars(trim("$_POST[nombre]"));
        $pass = htmlspecialchars(trim("$_POST[password]"));

        //GENERA CONTRASEÑA ENCRIPTADA
        $opciones = [
            'cost' => 12,
        ];
        $password = password_hash($pass, PASSWORD_BCRYPT, $opciones);

        $datos = array("nombre"=>$nombre,"usuario"=>$usuario, "password"=>$password);
        $usuarios = new Usuario();
        $resultado = $usuarios->nuevo($datos);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' =>'creado'
            );
        }  else {
            $respuesta = array(
                'respuesta' =>'no creado'
            );
        }
        echo json_encode($respuesta);
        break;
       
    case 'borrar':
		$usuario = new Usuario();
		$resultado = $usuario->borrar($datos['codigo']);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $usuario = new Usuario();
        $usuario->consultar($datos['codigo']);

        if($usuario->getUsua_codigo() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $usuario->getUsua_codigo(),
                'usuario' => $usuario->getUsua_nomb(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $usuario = new Usuario();
        $listado = $usuario->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
