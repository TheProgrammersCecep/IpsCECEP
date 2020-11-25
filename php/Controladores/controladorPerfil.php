<?php
 
require_once '../Modelos/modeloPerfil.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $gesPerfil = new gesPerfil();
        $resultado = $gesPerfil->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;


    case 'nuevo':
        $gesPerfil = new gesPerfil();
		$resultado = $gesPerfil->nuevo($datos);
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


    case 'borrar':
		$gesPerfil = new gesPerfil();
		$resultado = $gesPerfil->borrar($datos['codigo']);
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
        $gesPerfil = new gesPerfil();
        $gesPerfil->consultar($datos['codigo']);

        if($gesPerfil->getEmpleado_cod() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $gesPerfil->getEmpleado_cod(),
                'empleado' => $gesPerfil->getEmpleado_nomb(),
                'cargo' =>$gesPerfil->getEmpleado_cargo(),
                'pais' =>$gesPerfil->getEmpleado_pais(),
                'ciudad' =>$gesPerfil->getEmpleado_ciudad(),
                'sede' =>$gesPerfil->getEmpleado_oficina(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $gesPerfil = new gesPerfil();
        $listado = $gesPerfil->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;

        
}
?>
