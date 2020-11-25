<?php
 
require_once '../Modelos/modeloServicio.php';
$datos = $_GET;
switch ($_GET['accion']){

    case 'listar':
        $servicio = new Servicio();
        $listado = $servicio->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;

        case 'consultar':
            $servicio = new Servicio();
            $servicio->consultar($datos['codigo']);
    
            if($servicio->getServicio_cod() == null) {
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            }  else {
                $respuesta = array(
                    'codigo' => $servicio->getServicio_cod(),
                    'servicio' => $servicio->getServicio_nomb(),
                    'descripcion' => $servicio->getServicio_desc(),
                    'respuesta' =>'existe'
                );
            }
            echo json_encode($respuesta);
            break;
      
        case 'borrar':
            $servicio = new Servicio();
            $resultado = $servicio->borrar($datos['codigo']);
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
    
        case 'nuevo':
            $servicio = new Servicio();
            $resultado = $servicio->nuevo($datos);
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
    
        case 'editar':
            $servicio = new Servicio();
            $resultado = $servicio->editar($datos);
            $respuesta = array(
                    'respuesta' => $resultado
                );
            echo json_encode($respuesta);
            break;
  
}
?>