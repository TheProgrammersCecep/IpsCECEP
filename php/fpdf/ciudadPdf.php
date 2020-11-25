<?php

	require_once('../Modelos/modeloCiudad.php');
	$ciudad = new Ciudad();
	$listaciudad =  $ciudad->lista();
	$plano ="files/Ciudad_pdf.txt";
	$archivo = fopen($plano,"w") or die("Problemas en la creacion");
	foreach($listaciudad as $fila){
		fputs($archivo,$fila['ciudad_cod'].",".$fila['ciudad_nomb'].",".$fila['pais_nomb']);
		fputs($archivo,chr(13).chr(10));
	}

	require_once('tabla.php');
	$pdf = new PDF();
	$pdf->SetFont('Arial','',10);
	$pdf->AliasNbPages();
	$pdf->AddPage('portrait','letter');
	$titulos = array('Codigo','Nombre','Pais');
	$cant = 3;
	$w = array(65,65,65);
	$pdf->SetTitle("Informe Ciudad");
	$datos = $pdf->cargarDatos($plano);
	$pdf->TablaElegante($titulos,$datos,$cant,$w);
	

	$pdf->Output();

?>
