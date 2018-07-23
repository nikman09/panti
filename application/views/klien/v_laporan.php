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
$pdf->SetAuthor('M. Ifan mashudi');
$pdf->SetTitle('Biodata Klien');
$pdf->SetSubject('Aplikasi Pengelolaan Panti');
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

$pdf->SetFont('times', '', 12);

$pdf->AddPage('P', 'A4');


$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->setCellMargins(2, 2, 2, 2);
$pdf->SetFillColor(255, 255, 127);

$title = <<<OED
<h2>BIODATA KLIEN</h2>
OED;

$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);

$table =' <p><b> I. DATA KLIEN</b></p>
<table>
    <tr>
         <td width="250px">Nama</td>
         <td width="20px">:</td>
         <td width="500px" >'.$data->nama_klien.'</td>
    </tr>
    <tr>
         <td>NIK</td>
         <td>:</td>
         <td>'.$data->nik.'</td>
    </tr>
    <tr>
         <td>Tempat/Tanggal Lahir</td>
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
<p><b> II. DATA ORANG TUA KLIEN</b></p>
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
         <td>Telepen Orang Tua</td>
         <td>:</td>
         <td>'.$data->hp_ortu.'</td>
    </tr>
   
</table>';
$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'L', true);

$bawah = '
<br/><br/><br/><br/><br/>
<table>
<tr>
<td width="350px">
</td>
    <td>
<p align="center"> Martapura, '.date('d M Y').'
    <br/> Calon Klien <br/><br/><br/><br/>
   <b>'.$data->nama_klien.'</b>
</p>
</td>

</tr>
</table>';
$pdf->WriteHTMLCell(0, 0, '', '', $bawah, 0, 1, 0, true, 'R', true);

$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('BiodataKlien.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
