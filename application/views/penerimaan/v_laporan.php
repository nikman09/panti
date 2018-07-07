<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ifan  mashudi');
$pdf->SetTitle('Laporan');
$pdf->SetSubject('Skripsi');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(55, PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage('P', 'A4');


// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$title = <<<OED
<h3>Biodata Calon Klien<h/3>
OED;

$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
// $table = '<table style="border:1px solid #000; padding:6px;">';
// $table.= '<tr>
// 				<th style="border:1px solid #000;">No</th>
// 				<th style="border:1px solid #000;">Kode Asrama</th>
// 				<th style="border:1px solid #000;">Nama Asrama</th>
// 				<th style="border:1px solid #000;">Pengelola Asrama</th>
// 				<th style="border:1px solid #000;">Daya Tampung</th>
// 			</tr>';
// $no = 1;
// // foreach ($data->result() as $row) {
// // $table .= '<tr>
// // 			<td style="border:1px solid #000;">'.$no++.'</td>
// // 			<td style="border:1px solid #000;">'.$row->kd_asrama.'</td>
// // 			<td style="border:1px solid #000;">'.$row->asrama.'</td>
// // 			<td style="border:1px solid #000;">'.$pegawai.'</td>
// // 			<td style="border:1px solid #000;">'.$row->tampung.'</td>
// // 			</tr>';
// // }
// $table.= '</table>';

$table =' <p><b> I. Data Calon Klien</b></p>
<table>
    <tr>
         <td width="200px">Nama Calon Klien</td>
         <td width="10px">:</td>
         <td width="500px">'.$data->nama_klien.'</td>
    </tr>
    <tr>
         <td>NIK</td>
         <td>:</td>
         <td>'.$data->nik.'</td>
    </tr>
    <tr>
         <td>Tempat / Tanggal Lahir</td>
         <td>:</td>
         <td>'.$data->tempat_lahir.' / '.tgl_indo("$data->tanggal_lahir").'</td>
    </tr>
    <tr>
         <td>Jenis Kelamin</td>
         <td>:</td>
         <td>'.($data->sex=="L"?"Laki-laki":"Perempuan").'</td>
    </tr>
    <tr>
         <td>Agama</td>
         <td>:</td>
         <td>'.$data->agama.'</td>
    </tr>
    <tr>
         <td>Alamat</td>
         <td>:</td>
         <td rowspan="2">'.$data->alamat.'</td>
    </tr>
    <tr>
         <td></td>
         <td></td>
    </tr>
    <tr>
         <td>Kota/Kabupaten</td>
         <td>:</td>
         <td rowspan="2">'.$data->kota.'</td>
    </tr>
</table>
<br/>
<p><b> I. Data Orang Tua Calon Klien</b></p>
<table >
    <tr>
         <td  width="200px">Nama Ayah</td>
         <td width="10px" >:</td>
         <td width="500px">'.$data->nama_ayah.'</td>
    </tr>
    <tr>
         <td>Nama Ibu</td>
         <td >:</td>
         <td>'.$data->nama_ibu.'</td>
    </tr>
    <tr>
         <td>Alamat Orang Tua</td>
         <td>:</td>
         <td rowspan="2">'.$data->alamat_ortu.'</td>
    </tr>
    <tr>
         <td></td>
         <td></td>
       
    </tr>
    <tr>
         <td>Telepon Orang Tua</td>
         <td>:</td>
         <td>'.$data->hp_ortu.'</td>
    </tr>
   
</table>';
$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'L', true);

$bawah = '
<br/><br/><br/><br/><br/>
<table>
<tr>
<td width="400px">
</td>
    <td>
<p align="center"> Martapura, '.date('d-M-Y').'
    <br/> Calon Klien <br/><br/><br/><br/>
   <b> '.$data->nama_klien.'</b>
</p>
</td>

</tr>
</table>';
$pdf->WriteHTMLCell(0, 0, '', '', $bawah, 0, 1, 0, true, 'R', true);

$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('Laporan_PDN.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
