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

$pdf->SetHeaderData(95, PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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
$pdf->AddPage('L', 'A4');


// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopad

$title = '<h4>DAFTAR HADIR PESERTA PEMBINAAN </h4>Kelompok Belajar '.$rombel->rombel.' ';
$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
$title2 = '<p>Bulan : </p>';
$pdf->WriteHTMLCell(0, 0, '', '',$title2, 0, 1, 0, true, 'L', true);
$table ='
<table border="1px" cellspacing="0" border-color="#000" cellpadding="4" width="800px">
			<tr>
				<th rowspan="2" width="30px">No</th>
				<th rowspan="2" width="150px">Nama</th>
				<th colspan="31" align="center">Tanggal</th>
			</tr>
			<tr>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
				<th>6</th>
				<th>7</th>
				<th>8</th>
				<th>9</th>
				<th>10</th>
				<th>11</th>
				<th>12</th>
				<th>13</th>
				<th>14</th>
				<th>15</th>
				<th>16</th>
				<th>17</th>
				<th>18</th>
				<th>19</th>
				<th>20</th>
				<th>21</th>
				<th>22</th>
				<th>23</th>
				<th>24</th>
				<th>25</th>
				<th>26</th>
				<th>27</th>
				<th>28</th>
				<th>29</th>
				<th>30</th>
				<th>31</th>

			</tr>';

			$i=1;
			foreach ($data->result() as $dt ) {
				$table .= '
			<tr>
				<td >'.$i++.'</td>
				<td>'.$dt->nama_klien.'</td>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr> ';
		
			}
			$table.='</table>';
			$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'L', true);
			$bawah = '
			<br/><br/><br/><br/><br/>
			<table>
			<tr>
			<td width="600px">
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