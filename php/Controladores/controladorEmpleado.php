<?php
 
require_once '../Modelos/modeloEmpleado.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $gesEmpleado = new gesEmpleado();
        $resultado = $gesEmpleado->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;


    case 'nuevo':
        $gesEmpleado = new gesEmpleado();
		$resultado = $gesEmpleado->nuevo($datos);
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
		$gesEmpleado = new gesEmpleado();
		$resultado = $gesEmpleado->borrar($datos['codigo']);
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
        $gesEmpleado = new gesEmpleado();
        $gesEmpleado->consultar($datos['codigo']);

        if($gesEmpleado->getEmpleado_cod() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $gesEmpleado->getEmpleado_cod(),
                'empleado' => $gesEmpleado->getEmpleado_nomb(),
                'cargo' =>$gesEmpleado->getEmpleado_cargo(),
                'pais' =>$gesEmpleado->getEmpleado_pais(),
                'ciudad' =>$gesEmpleado->getEmpleado_ciudad(),
                'sede' =>$gesEmpleado->getEmpleado_oficina(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $gesEmpleado = new gesEmpleado();
        $listado = $gesEmpleado->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;

        
}
?>
