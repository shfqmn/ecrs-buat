<?php
if(empty($report->problem)){
    $report->problem[0]['details'] = 'Tiada sebarang aduan yang diterima dari para pelajar.';
    $report->problem[0]['timePlace'] = 'Sepanjang bulan '.$report->reportDate;
    $report->problem[0]['action'] = '-';
    $report->problem[0]['notes'] = '-';
}

?>

<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Microsoft Word 14 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:SimSun;
	panose-1:2 1 6 0 3 1 1 1 1 1;}
@font-face
	{font-family:SimSun;
	panose-1:2 1 6 0 3 1 1 1 1 1;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:"Trebuchet MS";
	panose-1:2 11 6 3 2 2 2 2 2 4;}
@font-face
	{font-family:"\@SimSun";
	panose-1:2 1 6 0 3 1 1 1 1 1;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0in;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-link:"Footer Char";
	margin:0in;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";}
span.FooterChar
	{mso-style-name:"Footer Char";
	mso-style-link:Footer;
	font-family:"Times New Roman","serif";}
 /* Page Definitions */
 @page WordSection1
	{size:11.0in 8.5in;
	margin:45.0pt .75in .5in 1.0in;}
div.WordSection1
	{page:WordSection1;}
-->
</style>

</head>

<body lang=EN-US>

<div class=WordSection1>

<p class=MsoNormal><span style='font-size:11.0pt;font-family:"Arial","sans-serif"'>                                                                                                                                                                        No.
Borang : <b>B</b></span><b><span style='font-size:10.0pt;font-family:"Arial","sans-serif"'>101/03/2013</span></b></p>

<p class=MsoNormal><span style='font-size:14.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>

<p class=MsoNormal><b><span style='font-size:14.0pt;font-family:"Arial","sans-serif"'>BORANG
LAPORAN BULANAN PPP / PEGAWAI / STAF </span></b></p>

<p class=MsoNormal><b><span style='font-size:14.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>

<p class=MsoNormal><span style='font-size:11.0pt;font-family:"Arial","sans-serif"'>BULAN                                                <b>:<?= $report->reportDate ?></b></span></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:0in;
margin-left:1.5in;margin-bottom:.0001pt;text-indent:-1.5in'><span
style='font-size:11.0pt;font-family:"Arial","sans-serif"'>TARIKH BERTUGAS                         :
<b><?= $report->workingDates ?></b></span></p>

<p class=MsoNormal style='margin-top:6.0pt'><span style='font-size:11.0pt;
font-family:"Arial","sans-serif"'>MASA                                                  :
<b><?= $report->workingTimes ?></b></span></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:0in;
margin-left:1.5in;margin-bottom:.0001pt;text-indent:-1.5in'><span
style='font-size:11.0pt;font-family:"Arial","sans-serif"'>NAMA PEGAWAI BERTUGAS               :
    <b><?php echo $report->user->name ?></b></span></p>

<p class=MsoNormal style='margin-top:6.0pt'><span style='font-size:11.0pt;
font-family:"Arial","sans-serif"'>NO. TEL PEGAWAI BERTUGAS         : 
    <b><?= $report->user->home_num." / ".$report->user->hp_num; ?></b></span></p>

<p class=MsoNormal><span style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>

<p class=MsoNormal><span style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=43 style='width:32.35pt;border:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:11.0pt;font-family:"Arial","sans-serif"'>BIL</span></b></p>
  </td>
  <td width=408 style='width:305.9pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:11.0pt;font-family:"Arial","sans-serif"'>PERKARA/ISU</span></b></p>
  </td>
  <td width=150 style='width:112.5pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:11.0pt;font-family:"Arial","sans-serif"'>TARIKH, MASA &amp;
  TEMPA</span></b><b><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>T</span></b></p>
  </td>
  <td width=174 style='width:130.65pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=FI
  style='font-size:11.0pt;font-family:"Arial","sans-serif"'>TINDAKAN</span></b></p>
  </td>
  <td width=127 style='width:95.4pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=FI
  style='font-size:11.0pt;font-family:"Arial","sans-serif"'>CATATAN</span></b></p>
  </td>
 </tr>
<?php foreach($report->problem as $i=>$problem){?>
 <tr style='height:42.7pt'>
  <td width=43 valign=top style='width:32.35pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:42.7pt'>
  <p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'><?php echo ($i+1).".";?></span></p>
  <p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=408 valign=top style='width:305.9pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:42.7pt'>
  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial","sans-serif"'><?php echo $problem['details']; ?></span></p>
  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=150 valign=top style='width:112.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:42.7pt'>
  <p class=MsoNormal><b><span lang=SV style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></b></p>
  <p class=MsoNormal><span lang=SV style='font-size:11.0pt;font-family:"Arial","sans-serif"'><?php echo $problem['timePlace']; ?></span></p>
  </td>
  <td width=174 valign=top style='width:130.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:42.7pt'>
  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
  lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif";color:red'>&nbsp;</span></p>
  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
  lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'><?php echo $problem['action']; ?></span></p>
  </td>
  <td width=408 valign=top style='width:305.9pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:42.7pt'>
  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial","sans-serif"'><?php echo $problem['notes']; ?></span></p>
  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
    <?php } ?>
 
</table>

<p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>

<p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>

<p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>

<p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>&nbsp;</span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=287 valign=top style='width:215.6pt;border:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><u><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>Tindakan
  Unit Pengurusan kolej &amp; NR</span></u></p>
  <p class=MsoNormal>&nbsp;</p>
  </td>
  <td width=60 valign=top style='width:45.0pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal>&nbsp;</p>
  </td>
 </tr>
 <tr>
  <td width=287 valign=top style='width:215.6pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>Pengurus
  Asrama Kanan</span></p>
  <p class=MsoNormal>&nbsp;</p>
  </td>
  <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='position:absolute;z-index:251660288;
  margin-left:356px;margin-top:18px;width:328px;height:152px'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td width=328 height=152 style='vertical-align:top'><span style='position:
    absolute;z-index:251660288'>
    <table cellpadding=0 cellspacing=0 width="100%">
     <tr>
      <td>
      <div style='padding:3.6pt 7.2pt 3.6pt 7.2pt'>
      <p class=MsoNormal><span lang=PT-BR style='font-size:11.0pt;font-family:
      "Trebuchet MS","sans-serif"'>&nbsp;</span></p>
      <p class=MsoNormal><span lang=PT-BR style='font-size:11.0pt;font-family:
      "Trebuchet MS","sans-serif"'>Tandatangan Pegawai Bertugas</span></p>
      <p class=MsoNormal><span lang=PT-BR style='font-size:11.0pt;font-family:
      "Trebuchet MS","sans-serif"'>&nbsp;</span></p>
      <p class=MsoNormal><span lang=PT-BR style='font-size:11.0pt;font-family:
      "Trebuchet MS","sans-serif"'>&nbsp;</span></p>
      <p class=MsoNormal><span lang=PT-BR style='font-size:11.0pt;font-family:
      "Trebuchet MS","sans-serif"'>.......................................</span></p>
      <p class=MsoNormal><b><span lang=PT-BR style='font-size:11.0pt;
      font-family:"Trebuchet MS","sans-serif"'><?php echo $report->user->name ?></span></b></p>
      <p class=MsoNormal><span lang=PT-BR style='font-size:11.0pt;font-family:
      "Trebuchet MS","sans-serif"'>Nama &amp; Cop</span></p>
      </div>
      </td>
     </tr>
    </table>
    </span>&nbsp;</td>
   </tr>
  </table>
  </span></p>
  </td>
 </tr>
 <tr>
  <td width=287 valign=top style='width:215.6pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>Pegawai
  Pembangunan Pelajar</span></p>
  <p class=MsoNormal>&nbsp;</p>
  </td>
  <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal>&nbsp;</p>
  </td>
 </tr>
 <tr>
  <td width=287 valign=top style='width:215.6pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>Pegawai
  Kaunseling / Pusat Islam</span></p>
  <p class=MsoNormal>&nbsp;</p>
  </td>
  <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal>&nbsp;</p>
  </td>
 </tr>
 <tr>
  <td width=287 valign=top style='width:215.6pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=FI style='font-size:11.0pt;font-family:"Arial","sans-serif"'>Tatatertib</span></p>
  <p class=MsoNormal>&nbsp;</p>
  </td>
  <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal>&nbsp;</p>
  </td>
 </tr>
 <tr style='height:24.25pt'>
  <td width=287 valign=top style='width:215.6pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:24.25pt'>
  <p class=MsoNormal>Simpanan / Fail</p>
  </td>
  <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:24.25pt'>
  <p class=MsoNormal>&nbsp;</p>
  </td>
 </tr>
</table>

<p class=MsoNormal>&nbsp;</p>

<p class=MsoNormal>&nbsp;</p>

<p class=MsoNormal>&nbsp;</p>

</div>

</body>

</html>
