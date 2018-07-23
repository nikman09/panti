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
$pdf->SetAuthor('M. Ifan Mashudi');
$pdf->SetTitle('Daftar Hadir Klien');
$pdf->SetSubject('Aplikasi Pengelolaan Panti');
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
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage('L', 'F4');


// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopad

$title = '<h3>DAFTAR HADIR PESERTA PEMBINAAN <br/>KELOMPOK BELAJAR '.$rombel->rombel.'</h3> ';
$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
$title2 = '<p>Bulan : </p>';
$pdf->WriteHTMLCell(0, 0, '', '',$title2, 0, 1, 0, true, 'L', true);
$table ='
<table border="1px" cellspacing="0" border-color="#000" cellpadding="4" width="920px">
			<tr>
				<th rowspan="2" width="35px" align="center"><b><h4>NO</h4></b></th>
				<th rowspan="2" width="150px" align="center"><b><h4>NAMA</h4></b></th>
				<th colspan="31" align="center"><b>TANGGAL</b></th>
			</tr>
			<tr>
				<th align="center"><b>1</b></th>
				<th align="center"><b>2</b></th>
				<th align="center"><b>3</b></th>
				<th align="center"><b>4</b></th>
				<th align="center"><b>5</b></th>
				<th align="center"><b>6</b></th>
				<th align="center"><b>7</b></th>
				<th align="center"><b>8</b></th>
				<th align="center"><b>9</b></th>
				<th align="center"><b>10</b></th>
				<th align="center"><b>11</b></th>
				<th align="center"><b>12</b></th>
				<th align="center"><b>13</b></th>
				<th align="center"><b>14</b></th>
				<th align="center"><b>15</b></th>
				<th align="center"><b>16</b></th>
				<th align="center"><b>17</b></th>
				<th align="center"><b>18</b></th>
				<th align="center"><b>19</b></th>
				<th align="center"><b>20</b></th>
				<th align="center"><b>21</b></th>
				<th align="center"><b>22</b></th>
				<th align="center"><b>23</b></th>
				<th align="center"><b>24</b></th>
				<th align="center"><b>25</b></th>
				<th align="center"><b>26</b></th>
				<th align="center"><b>27</b></th>
				<th align="center"><b>28</b></th>
				<th align="center"><b>29</b></th>
				<th align="center"><b>30</b></th>
				<th align="center"><b>31</b></th>
			</tr>';

			$i=1;
			foreach ($data->result() as $dt ) {
				$table .= '
			<tr>
				<td align="center">'.$i++.'</td>
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
			<br/>
			<table>
			<tr>
			<td width="600px">
			</td>
				<td>
			<p align="center"> Martapura, '.date('d M Y').'
			<br/>KEPALA SEKSI 
			<br/>PEMBINAAN DAN REOSIALISASI<br/><br/><br/><br/>
			<b>Dra. NURUL HELYATI</b> <br/>
			Penata Tk I <br/>
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