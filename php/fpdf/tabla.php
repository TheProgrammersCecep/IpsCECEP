<?php
require('fpdf.php');

class PDF extends FPDF
{
function Header()
{
    //Banner
    $this->SetFillColor(0,0,255);
    $this->Rect(0,0,220,40,'F');
    // Logo
    $this->Image('../../Recursos/img/inicio.jpeg',10,8,44);
    // Arial bold 15
    $this->SetFont('Arial','B',30);
    $this->SetTextColor(255,255,255);
    // Movernos a la derecha
    $this->Cell(50);
    // T�tulo
    $this->Cell(100,22,'IPS CECEP',0,0,'L');
    // Salto de l�nea
    $this->Ln(45);
    $this->SetFont('Arial','B',15);
    $this->Cell(60);
    $this->SetTextColor(0,0,0);
    $this->Cell(70,10,'Informe IPS',0,0,'C');
    $this->SetFont('Arial','',14);
}

// Cargar los datos
function cargarDatos($file)
{
    // Leer las l�neas del fichero
    $archivo = file($file);
    $datos = array();
    foreach($archivo as $linea)
        $datos[] = explode(',',trim($linea));
    return $datos;
}


// Tabla Elegante
function TablaElegante($titulos, $datos, $cant, $w)
{
    
    // Colores, ancho de l�nea y fuente en negrita
    $this->SetFillColor(0,0,255);
    $this->SetTextColor(255);
    $this->SetDrawColor(0,0,0);
    $this->SetLineWidth(.2);
    $this->SetFont('','B',14);
    $this->Ln(15);
    for($i=0;$i<count($titulos);$i++)
        $this->Cell($w[$i],7,$titulos[$i],1,0,'C',true);
    $this->Ln();
    // Restauraci�n de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('','',10);
    // Datos
    $fill = false;
    foreach($datos as $row)
    {
        for($i=0;$i<$cant;$i++)
        {
                $this->Cell($w[$i],6,$row[$i],'LR',0,'C',$fill);
        }
        
        //$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        //$this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
        //$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
		//$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // L�nea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

function Footer()
{
    $this->SetFillColor(0,0,255);
    $this->Rect(0,250,220,40,'F');
    $this->SetY(-20);
    // Posici�n: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',13);
    $this->SetTextColor(255,255,255);
    // N�mero de p�gina
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'R');
    $this->SetY(-20);
    $this->SetX(5);
    $this->Write(5,'Copyright IPS CECEP 2020');
    $this->Ln(8);
    $this->Write(4,'Soporte@ipscecep.com');
}

}

?>