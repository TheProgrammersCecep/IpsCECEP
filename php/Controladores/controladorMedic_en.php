<?php
 
require_once '../Modelos/modeloMedicamento_en.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $gesMedicamentoEn = new gesMedicamentoEn();
        $resultado = $gesMedicamentoEn->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;


    case 'nuevo':
        $gesMedicamentoEn = new gesMedicamentoEn();
		$resultado = $gesMedicamentoEn->nuevo($datos);
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
            $gesMedicamentoEn = new gesMedicamentoEn();
            $resultado = $gesMedicamentoEn->nuevar($datos);
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
		$gesMedicamentoEn = new gesMedicamentoEn();
		$resultado = $gesMedicamentoEn->borrar($datos['codigo']);
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
        $gesMedicamentoEn = new gesMedicamentoEn();;
        $gesMedicamentoEn->consultar($datos['codigo']);

        if($gesMedicamentoEn->getMedic_formula() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'formula' => $gesMedicamentoEn->getMedic_formula(),
                'cedula' => $gesMedicamentoEn->getMedic_cedula(),
                'usuario' =>$gesMedicamentoEn->getMedic_usuario(),
                'medicamentos' =>$gesMedicamentoEn->getMedic_medic(),
                'respuesta' =>'existe'
            );
        }

        echo json_encode($respuesta);
        break;

        case 'consultar_imp':
            require_once('../fpdf/formulaPdf.php');
            $gesFormula = new Formulas();;
            $gesFormula->consultarIMP($datos['codigo']);
            break;

    case 'listar':
        $gesMedicamentoEn = new gesMedicamentoEn();
        $listado = $gesMedicamentoEn->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;

        
}
?>
