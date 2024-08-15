
<?php

include('database.php');
$database = new Database();
$result = $database->runQuery("SELECT id,name, surname, age, gender, institution, student_number,email, cell,department,level,role FROM registration ");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='hackerthorn' 
AND `TABLE_NAME`='registration'
and `COLUMN_NAME` in ('id','name','surname','age','gender','institution','student_number','email','cell','department','level','role')");

require('fpdf/fpdf.php');
$pdf = new FPDF();

$pdf->AddPage('L','A3');
$pdf->SetFont('Arial','B',5);
//$pdf->SetWidths(array(30, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90,30));
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(34,7,$column_heading,1);
		
}


foreach($result as $row) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(34,12,$column,1);
}
$pdf->Output(); 
?>
