<?php
 
require_once '../Modelos/modeloSede.php';
$datos = $_GET;
switch ($_GET['accion']){

    case 'listar':
        $crearCita = new Sede();
        $listado = $crearCita->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;

        case 'consultar':
            $sede = new Sede();
            $sede->consultar($datos['codigo']);
    
            if($sede->getSede_cod() == null) {
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            }  else {
                $respuesta = array(
                    'codigo' => $sede->getSede_cod(),
                    'sede' => $sede->getSede_nomb(),
                    'dir' => $sede->getSede_dir(),
                    'ciudad' => $sede->getCiudad_cod(),
                    'pais' => $sede->getPais_cod(),
                    'respuesta' =>'existe'
                );
            }
            echo json_encode($respuesta);
            break;
      
        case 'borrar':
            $sede = new Sede();
            $resultado = $sede->borrar($datos['codigo']);
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
            $sede = new Sede();
            $resultado = $sede->nuevo($datos);
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
            $sede = new Sede();
            $resultado = $sede->editar($datos);
            $respuesta = array(
                    'respuesta' => $resultado
                );
            echo json_encode($respuesta);
            break;
  
}
?>