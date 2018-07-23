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
$pdf->SetTitle('Laporan Klien Daerah Asal ');
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

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage('P', 'F4');


// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopad

$title = '<h4>DATA PENYANDANG DISABILITAS NETRA
<br/>PESERTA PROGRAM PELAYANAN REHABILITASI SOSIAL
<br/> BERDASARKAN DAERAH ASAL</b> <br/>
KABUPATEN/KOTA '.$kota.'</h4>';
$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
$table ='
        <table border="1px" cellspacing="0" border-color="#000" cellpadding="4" width="1000px">
  
            <tr height="100px">
                <td width="40px">NO</td>
                <td width="180px">NAMA</td>
                <td width="95px">UMUR/ TTL</td>
                <td width="200px">ALAMAT</td>
                <td width="115">PROGRAM</td>
            </tr>
    
         ';
           $i=0;
           foreach ($data as $row) {
                $i++;
              	$table.= "<tr><td>".$i."</td>";
                $table.= "<td>".$row->nama_klien."</td>";
                $biday = new DateTime($row->tanggal_lahir);
                $today = new DateTime();
                $diff = $today->diff($biday);
              
                $table.= "<td>".  $diff->y." Tahun / ".tgl_indo($row->tanggal_lahir)."</td>";
                $table.= "<td>".$row->alamat."</td>";
                $table.= "<td>".$row->rombel."</td></tr>";
           }

        $table.='</table>';
        $pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);
		$bawah = '
		<br/><br/><br/><br/><br/>
		<table>
		<tr>
		<td width="400px">
		</td>
			<td>
		<p align="center">Martapura, '.date('d M Y').'
		<br/>Kepala Panti Sosial <br/><br/><br/><br/>
		<b>Drs. H. M. NASIR, M.AP</b> <br/>
		Pembina Tk I <br/>
		NIP. 19640611 199103 1 009
		</p>
		</td>
		
		</tr>
		</table>';
		$pdf->WriteHTMLCell(0, 0, '', '', $bawah, 0, 1, 0, true, 'R', true);
		
		$pdf->lastPage();
		
		// ---------------------------------------------------------
		
		//Close and output PDF document
		ob_clean();
		$pdf->Output('Laporan Klien Daerah '.$kota.'.pdf', 'I');
		
		//============================================================+
		// END OF FILE
		//============================================================+
		

