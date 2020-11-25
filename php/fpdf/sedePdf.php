<?php

	require_once('../Modelos/modeloSede.php');
	$Sede = new Sede();
	$listaSede =  $Sede->lista();
	$plano ="files/Sede_pdf.txt";
	$archivo = fopen($plano,"w") or die("Problemas en la creacion");
	foreach($listaSede as $fila){
		fputs($archivo,$fila['sede_cod'].",".$fila['sede_nomb'].",".$fila['sede_dir'].",".$fila['ciudad_nomb'].",".$fila['pais_nomb']);
		fputs($archivo,chr(13).chr(10));
	}

	require_once('tabla.php');
	$pdf = new PDF();
	$pdf->SetFont('Arial','',10);
	$pdf->AliasNbPages();
	$pdf->AddPage('portrait','letter');
	$titulos = array('Codigo','Sede','Direccion','Ciudad','Sede');
	$cant = 5;
	$pdf->SetTitle("Informe Sede");
	$datos = $pdf->cargarDatos($plano);
	$w = array(36,40,45,36,36);
	$pdf->TablaElegante($titulos,$datos,$cant,$w);
	

	$pdf->Output();

?>
