<?php   
require ('FPDF/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte pdf',1,0,'C');
    // Salto de línea
    $this->Ln(20);
	
	$this->Cell(30,10,'cli_id',1,0,'C',0);
	$this->Cell(30,10,'cli_rfc',1,0,'C',0);
	$this->Cell(30,10,'cli_nombre',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}


include 'DB/CONEXION.php';
$consulta="SELECT * FROM cliente";
$resultado=$mysqli->query($consulta);





$pdf = new PDF ();
$pdf->AliasNbpages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(30,10,$row['cli_id'],1,0,'C',0);
	$pdf->Cell(30,10,$row['cli_rfc'],1,0,'C',0);
	$pdf->Cell(30,10,$row['cli_nombre'],1,1,'C',0);
	
}


$pdf->Output();


	   
?> 
 