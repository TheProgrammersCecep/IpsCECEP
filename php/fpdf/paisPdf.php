<?php

	require_once('../Modelos/modeloPais.php');
	$Pais = new Pais();
	$listaPais =  $Pais->lista();
	$plano ="files/Pais_pdf.txt";
	$archivo = fopen($plano,"w") or die("Problemas en la creacion");
	foreach($listaPais as $fila){
		fputs($archivo,$fila['pais_cod'].",".$fila['pais_nomb']);
		fputs($archivo,chr(13).chr(10));
	}

	require_once('tabla.php');
	$pdf = new PDF();
	$pdf->SetFont('Arial','',10);
	$pdf->AliasNbPages();
	$pdf->AddPage('portrait','letter');
	$titulos = array('Codigo','Pais');
	$cant = 2;
	$w = array(97,97);
	$pdf->SetTitle("Informe Pais");
	$datos = $pdf->cargarDatos($plano);
	$pdf->TablaElegante($titulos,$datos,$cant,$w);
	

	$pdf->Output();

?>
