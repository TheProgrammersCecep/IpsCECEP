<?php

	require_once('../Modelos/modeloServicio.php');
	$Servicios = new Servicio();
	$listaServicios =  $Servicios->lista();
	$plano ="files/Servicios_pdf.txt";
	$archivo = fopen($plano,"w") or die("Problemas en la creacion");
	foreach($listaServicios as $fila){
		fputs($archivo,$fila['ser_cod'].",".$fila['ser_nombre'].",".$fila['ser_descripcion']);
		fputs($archivo,chr(13).chr(10));
	}

	require_once('tabla.php');
	$pdf = new PDF();
	$pdf->SetFont('Arial','',10);
	$pdf->AliasNbPages();
	$pdf->AddPage('portrait','letter');
	$titulos = array('Codigo','Servicio','Descripcion');
	$cant = 3;
	$pdf->SetTitle("Informe de Servicios");
	$datos = $pdf->cargarDatos($plano);
	$w = array(28,60,102);
	$pdf->TablaElegante($titulos,$datos,$cant,$w);
	

	$pdf->Output();

?>
