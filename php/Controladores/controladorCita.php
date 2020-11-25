<?php
 
require_once '../Modelos/modeloCita.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $crearCita = new crearCita();
        $resultado = $crearCita->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;


    case 'crear':
        $crearCita = new crearCita();
		$resultado = $crearCita->nuevo($datos);
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
		$crearCita = new crearCita();
		$resultado = $crearCita->borrar($datos['codigo']);
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
        $crearCita = new crearCita();
        $crearCita->consultar($datos['codigo']);

        if($crearCita->getHis_cod() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $crearCita->getHis_cod(),
                'paciente' => $crearCita->getHis_paciente(),
                'pacientecod' => $crearCita->getHis_paciente_cod(),
                'fecha' =>$crearCita->getHis_fecha(),
                'hora' =>$crearCita->getHis_hora(),
                'medico' =>$crearCita->getHis_medico(),
                'servicio' =>$crearCita->getHis_servicio(),
                'descripcion' =>$crearCita->getHis_desc(),
                'asesor' =>$crearCita->getHis_asesor(),
                'pais' =>$crearCita->getHis_pais(),
                'ciudad' =>$crearCita->getHis_ciudad(),
                'sede' =>$crearCita->getHis_sede(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $crearCita = new crearCita();
        $listado = $crearCita->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;

    case 'listarH':
        $crearCita = new crearCita();
        $listado = $crearCita->listaHistorial();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;

        
}
?>
