<?php
 
require_once '../Modelos/modeloMedico.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $gesMedico = new gesMedico();
        $resultado = $gesMedico->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;


    case 'nuevo':
        $gesMedico = new gesMedico();
		$resultado = $gesMedico->nuevo($datos);
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
		$gesMedico = new gesMedico();
		$resultado = $gesMedico->borrar($datos['codigo']);
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
        $gesMedico = new gesMedico();
        $gesMedico->consultar($datos['codigo']);

        if($gesMedico->getMedico_cod() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $gesMedico->getMedico_cod(),
                'medico' => $gesMedico->getMedico_nomb(),
                'pais' =>$gesMedico->getMedico_pais(),
                'ciudad' =>$gesMedico->getMedico_ciudad(),
                'sede' =>$gesMedico->getMedico_sede(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $gesMedico = new gesMedico();
        $listado = $gesMedico->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;

        
}
?>
