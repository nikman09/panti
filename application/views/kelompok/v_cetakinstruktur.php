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

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopad

$title = '<h4>Daftar Hadir Instruktur </h4>Kelompok Belajar '.$rombel->rombel.' ';
$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
$table ='
<table border="1px" cellspacing="0" border-color="#000" cellpadding="4" width="700px">
			<tr>
				<th width="30px">No</th>
				<th>Hari</th>
				<th>Nama Instruktur</th>
				<th>Mata Pelajaran</th>
				<th>Waktu</th>
				<th>Tanda Tangan</th>
			</tr>';
	
			$i=0;
			$jumlah = $senin->num_rows();
			foreach ($senin->result() as $dt ) {
				 $i++;
		
			$table .= '<tr>
				<td >'.$i.'</td>';
				 if($i==1){  	$table .= '<td rowspan="'.$jumlah.'">Senin</td>'; }

				$table .= ' <td>'.$dt->nama_pegawai.'</td>
				<td>'.$dt->mapel.'</td>
				<td>'.$dt->jam.'</td>
				<td></td>
			</tr>';
			
			}

		
			
			$i=0;
			$jumlah = $selasa->num_rows();
			foreach ($selasa->result() as $dt ) {
				 $i++;
		
			$table .= '<tr>
				<td >'.$i.'</td>';
				 if($i==1){  	$table .= '<td rowspan="'.$jumlah.'">Selasa</td>'; }

				$table .= ' <td>'.$dt->nama_pegawai.'</td>
				<td>'.$dt->mapel.'</td>
				<td>'.$dt->jam.'</td>
				<td></td>
			</tr>';
			
			}

			
			$i=0;
			$jumlah = $rabu->num_rows();
			foreach ($rabu->result() as $dt ) {
				 $i++;
		
			$table .= '<tr>
				<td >'.$i.'</td>';
				 if($i==1){  	$table .= '<td rowspan="'.$jumlah.'">Rabu</td>'; }

				$table .= ' <td>'.$dt->nama_pegawai.'</td>
				<td>'.$dt->mapel.'</td>
				<td>'.$dt->jam.'</td>
				<td></td>
			</tr>';
			
			}

			$i=0;
			$jumlah = $kamis->num_rows();
			foreach ($kamis->result() as $dt ) {
				 $i++;
		
			$table .= '<tr>
				<td >'.$i.'</td>';
				 if($i==1){  	$table .= '<td rowspan="'.$jumlah.'">Kamis</td>'; }

				$table .= ' <td>'.$dt->nama_pegawai.'</td>
				<td>'.$dt->mapel.'</td>
				<td>'.$dt->jam.'</td>
				<td></td>
			</tr>';
			
			}

			$i=0;
			$jumlah = $jumat->num_rows();
			foreach ($jumat->result() as $dt ) {
				 $i++;
		
			$table .= '<tr>
				<td >'.$i.'</td>';
				 if($i==1){  	$table .= '<td rowspan="'.$jumlah.'">Jumat</td>'; }

				$table .= ' <td>'.$dt->nama_pegawai.'</td>
				<td>'.$dt->mapel.'</td>
				<td>'.$dt->jam.'</td>
				<td></td>
			</tr>';
			
			}
			$i=0;
			$jumlah = $sabtu->num_rows();
			foreach ($sabtu->result() as $dt ) {
				 $i++;
		
			$table .= '<tr>
				<td >'.$i.'</td>';
				 if($i==1){  	$table .= '<td rowspan="'.$sabtu.'">Kamis</td>'; }

				$table .= ' <td>'.$dt->nama_pegawai.'</td>
				<td>'.$dt->mapel.'</td>
				<td>'.$dt->jam.'</td>
				<td></td>
			</tr>';
			
			}

			$i=0;
			$jumlah = $minggu->num_rows();
			foreach ($minggu->result() as $dt ) {
				 $i++;
		
			$table .= '<tr>
				<td >'.$i.'</td>';
				 if($i==1){  	$table .= '<td rowspan="'.$minggu.'">Kamis</td>'; }

				$table .= ' <td>'.$dt->nama_pegawai.'</td>
				<td>'.$dt->mapel.'</td>
				<td>'.$dt->jam.'</td>
				<td></td>
			</tr>';
			
			}
			

			$table.='</table>';
			
			$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'L', true);
			$bawah = '
			<br/><br/><br/><br/><br/>
			<table>
			<tr>
			<td width="400px">
			</td>
				<td>
			<p align="center"> Martapura, '.date('d-M-Y').'
			<br/> Kasi Pembinaan dan Resosialisasi <br/><br/><br/><br/>
			<b>Dra. Nurul Helyati</b> <br/>
			Pembina Tk I <br/>
			NIP. 19600721 198203 2 003
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
			
	
	