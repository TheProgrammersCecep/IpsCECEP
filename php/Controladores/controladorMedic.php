<?php
 
require_once '../Modelos/modeloMedicamento.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $gesMedicamento = new gesMedicamento();
        $resultado = $gesMedicamento->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;


    case 'nuevo':
        $gesMedicamento = new gesMedicamento();
		$resultado = $gesMedicamento->nuevo($datos);
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


        case 'nuevar':
            $gesMedicamento = new gesMedicamento();
            $resultado = $gesMedicamento->nuevar($datos);
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
		$gesMedicamento = new gesMedicamento();
		$resultado = $gesMedicamento->borrar($datos['codigo']);
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
        $gesMedicamento = new gesMedicamento();
        $gesMedicamento->consultar($datos['codigo']);

        if($gesMedicamento->getMedic_cod() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $gesMedicamento->getMedic_cod(),
                'medicamento' => $gesMedicamento->getMedic_nomb(),
                'descripcion' =>$gesMedicamento->getMedic_desc(),
                'cantidad' =>$gesMedicamento->getMedic_can(),
                'fechav' =>$gesMedicamento->getMedic_fechav(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $gesMedicamento = new gesMedicamento();
        $listado = $gesMedicamento->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;

        
}
?>
