<?php

	require_once('../Modelos/modeloCita.php');
	$Cita = new crearCita();
	$listaCita =  $Cita->listaHistorial();
	$plano ="files/Cita_pdf.txt";
	$archivo = fopen($plano,"w") or die("Problemas en la creacion");
	foreach($listaCita as $fila){
		fputs($archivo,$fila['his_cod'].",".$fila['his_paciente'].",".$fila['his_cedula'].",".$fila['his_fecha'].",".$fila['his_hora']
		.",".$fila['medico_nomb'].",".$fila['ser_nombre'].",".$fila['sede_nomb']);
		fputs($archivo,chr(13).chr(10));
	}

	require_once('tabla_retrait.php');
	$pdf = new PDF();
	$pdf->SetFont('Arial','',10);
	$pdf->AliasNbPages();
	$pdf->AddPage('retrait','letter');
	$titulos = array('Cod','Paciente','Cedula','Fecha','Hora','Medico','Serv','Sede');
	$cant = 8;
	$pdf->SetTitle("Informe Cita");
	$datos = $pdf->cargarDatos($plano);
	$w = array(18,65,30,25,20,33,35,35);
	$pdf->TablaElegante($titulos,$datos,$cant,$w);
	

	$pdf->Output();

?>
