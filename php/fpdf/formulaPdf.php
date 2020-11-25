<?php
	class Formulas
	{

		public function consultarIMP($formula_id='') 
		{
			require_once('../Modelos/modeloMedicamento_En.php');
			$Medicamento = new gesMedicamentoEn();
			$listaMedicamento =  $Medicamento->listaIMP($formula_id);
			$plano ="../fpdf/files/Formula_pdf.txt";
			$archivo = fopen($plano,"w") or die("Problemas en la creacion");
			foreach($listaMedicamento as $fila){
				fputs($archivo,$fila['formula_id'].";".$fila['paciente_cedula'].";".$fila['paciente_nomb']
				.";".$fila['medicamentos']);
				fputs($archivo,chr(13).chr(10));
			}

			require_once('../fpdf/genFormula.php');
			$pdf = new PDF();
			$pdf->SetFont('Arial','',10);
			$pdf->AliasNbPages();
			$pdf->AddPage('portrait','letter');
			$titulos = array('Id','Cedula','Nombre');
			$cant = 3;
			$w = array(65,65,65);
			$pdf->SetTitle("Formulas medicas");
			$datos = $pdf->cargarDatos($plano);
			$pdf->TablaElegante($titulos,$datos,$cant,$w);
			

			$pdf->Output();

		}

			

		
	}

?>
