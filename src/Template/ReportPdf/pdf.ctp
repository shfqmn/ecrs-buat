<?php
use mikehaertl\wkhtmlto\Pdf;

header("Content-Transfer-Encoding: binary");
header('Expires: 0');
header('Pragma: no-cache');

header("Content-type:application/pdf");

// It will be called downloaded.pdf
//header("Content-Disposition: attachment;filename='report.pdf'");

//debug($report);die;

$this->layout = 'ajax';

$pdf = new Pdf(['disable-javascript']);
$pdf->addPage('127.0.0.1/ecrs-buat/pdf/view/'.$report->id);
foreach($report->sick as $sick){
	$pdf->addPage('127.9.9.1/ecrs-buat/pdf/sick/'.$sick->id);
}
$pdf->binary = "C:\\xampp\\htdocs\\ecrs-buat\\wkhtmltopdf\\bin\\wkhtmltopdf.exe";
if (!$pdf->send()) {
    throw new Exception('Could not create PDF: '.$pdf->getError());
}
exit;
?>