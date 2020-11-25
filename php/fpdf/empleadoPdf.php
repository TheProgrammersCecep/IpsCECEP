<?php

	require_once('../Modelos/modeloEmpleado.php');
	$Empleado = new gesEmpleado();
	$listaEmpleado =  $Empleado->lista();
	$plano ="files/Empleado_pdf.txt";
	$archivo = fopen($plano,"w") or die("Problemas en la creacion");
	foreach($listaEmpleado as $fila){
		fputs($archivo,$fila['empleado_cod'].",".$fila['empleado_nomb'].",".$fila['empleado_cargo'].",".$fila['sede_nomb']
		.",".$fila['ciudad_nomb'].",".$fila['pais_nomb']);
		fputs($archivo,chr(13).chr(10));
	}

	require_once('tabla.php');
	$pdf = new PDF();
	$pdf->SetFont('Arial','',10);
	$pdf->AliasNbPages();
	$pdf->AddPage('portrait','letter');
	$titulos = array('Codigo','Empleado','Cargo','Sede','Ciudad','Pais');
	$cant = 6;
	$w = array(27,35,32,37,32,32);
	$pdf->SetTitle("Informe Empleado");
	$datos = $pdf->cargarDatos($plano);
	$pdf->TablaElegante($titulos,$datos,$cant,$w);
	

	$pdf->Output();

?>
