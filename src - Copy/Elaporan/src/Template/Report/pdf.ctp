<?php
use mikehaertl\wkhtmlto\Pdf;

//header("Content-Transfer-Encoding: binary");
//header('Expires: 0');
//header('Pragma: no-cache');

//header("Content-type:application/pdf");

// It will be called downloaded.pdf
//header("Content-Disposition: attachment;filename='report.pdf'");

//debug($report);die;

$this->layout = 'ajax';
$path = SITE_PATH."elaporan";

$pdf = new Pdf(['disable-javascript']);
$pdf->addPage('http://elaporan-qxum.c9users.io/esrk/elaporan/report/view/'.$report->reference);
foreach($report->sick as $sick){
	$pdf->addPage('http://elaporan-qxum.c9users.io/esrk/elaporan/sick/view/'.$sick->id);
}
$pdf->binary = "~/workspace/esrk/wkhtmltox/bin/wkhtmltopdf";
if (!$pdf->send()) {
    throw new Exception('Could not create PDF: '.$pdf->getError());
}
exit;
?>