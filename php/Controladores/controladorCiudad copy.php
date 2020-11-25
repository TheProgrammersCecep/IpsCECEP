<?php
 
require_once '../Modelos/modeloCiudad.php';
$datos = $_GET;
switch ($_GET['accion']){

    case 'listar':
        $ciudad = new Ciudad();
        $listado = $ciudad->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;

    case 'consultar':
        $ciudad = new Ciudad();
        $ciudad->consultar($datos['codigo']);

        if($ciudad->getCiudad_cod() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $ciudad->getCiudad_cod(),
                'ciudad' => $ciudad->getCiudad_nomb(),
                'pais' => $ciudad->getPais_cod(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;
  
    case 'borrar':
        $ciudad = new Ciudad();
        $resultado = $ciudad->borrar($datos['codigo']);
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
        $ciudad = new Ciudad();
        $resultado = $ciudad->nuevo($datos);
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
        $ciudad = new Ciudad();
        $resultado = $ciudad->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
}
?>