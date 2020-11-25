<?php
 
require_once '../Modelos/modeloAsesor.php';
$datos = $_GET;
switch ($_GET['accion']){

    case 'listar':
        $asesor = new Asesor();
        $listado = $asesor->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;

        case 'consultar':
            $asesor = new Asesor();
            $asesor->consultar($datos['codigo']);
    
            if($asesor->getAsesor_cod() == null) {
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            }  else {
                $respuesta = array(
                    'codigo' => $asesor->getAsesor_cod(),
                    'asesor' => $asesor->getAsesor_nomb(),
                    'respuesta' =>'existe'
                );
            }
            echo json_encode($respuesta);
            break;
      
        case 'borrar':
            $asesor = new Asesor();
            $resultado = $asesor->borrar($datos['codigo']);
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
            $asesor = new Asesor();
            $resultado = $asesor->nuevo($datos);
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
            $asesor = new Asesor();
            $resultado = $asesor->editar($datos);
            $respuesta = array(
                    'respuesta' => $resultado
                );
            echo json_encode($respuesta);
            break;
  
}
?>