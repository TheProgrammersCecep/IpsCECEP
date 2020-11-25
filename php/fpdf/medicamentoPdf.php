<?php
	
	require_once('../Modelos/modeloMedicamento.php');
	$Medicamento = new gesMedicamento();
	$listaMedicamento =  $Medicamento->lista();
	$plano ="files/Medicamento_pdf.txt";
	$archivo = fopen($plano,"w") or die("Problemas en la creacion");
	foreach($listaMedicamento as $fila){
		fputs($archivo,$fila['medic_cod'].",".$fila['medic_nomb'].",".$fila['medic_can']
		.",".$fila['medic_fechav']);
		fputs($archivo,chr(13).chr(10));
	}

	require_once('tabla.php');
	$pdf = new PDF();
	$pdf->SetFont('Arial','',10);
	$pdf->AliasNbPages();
	$pdf->AddPage('portrait','letter');
	$titulos = array('Codigo','Medicamento','Cantidades','Vencimiento');
	$cant = 4;
	$w = array(48,48,48,48);
	$pdf->SetTitle("Informe Medicamento");
	$datos = $pdf->cargarDatos($plano);
	$pdf->TablaElegante($titulos,$datos,$cant,$w);
	

	$pdf->Output();
?>
