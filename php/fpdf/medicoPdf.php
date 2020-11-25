<?php

	require_once('../Modelos/modeloMedico.php');
	$Medico = new gesMedico();
	$listaMedico =  $Medico->lista();
	$plano ="files/Medico_pdf.txt";
	$archivo = fopen($plano,"w") or die("Problemas en la creacion");
	foreach($listaMedico as $fila){
		fputs($archivo,$fila['medico_cod'].",".$fila['medico_nomb'].",".$fila['sede_nomb'].",".$fila['ciudad_nomb']
		.",".$fila['pais_nomb']);
		fputs($archivo,chr(13).chr(10));
	}

	require_once('tabla.php');
	$pdf = new PDF();
	$pdf->SetFont('Arial','',10);
	$pdf->AliasNbPages();
	$pdf->AddPage('portrait','letter');
	$titulos = array('Codigo','Medico','Sede','Ciudad','Pais');
	$cant = 5;
	$w = array(27,42,45,39,39);
	$pdf->SetTitle("Informe Medico");
	$datos = $pdf->cargarDatos($plano);
	$pdf->TablaElegante($titulos,$datos,$cant,$w);
	

	$pdf->Output();

?>
