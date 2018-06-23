<?php

function hari_ini ($hari){
	date_default_timezone_set("Asia/Bangkok");
	$seminggu = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
	$hari_ini = $seminggu[$hari];
	return $hari_ini;

}

function getBulan($bln){

	switch ($bln) {
		case 1:
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;	
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;	
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;	
	}
}

function tgl_indo($date){

	$exp  = explode('-', $date);
	$date = "";

	if (count($exp) == 3) {
		$bulan = getBulan($exp[1]);
		$data = $exp[2]. ' '. $bulan . ' ' . $exp[0];
	}

	return $data;
}

function tgl_str($date){
	$exp = explode('-', $date);
	return $exp[2]. '-'. $exp[1] . '-' . $exp[0];
}

function cari_semester(){
	date_default_timezone_set('Asia/Jakarta');
	$bln = date('m');

	switch ($bln) {
		case 1:
		case 2:
		case 3:
		case 4:
		case 5:
		case 6:
			return "genap";
			break;
		case 7:
		case 8:
		case 9;
		case 10:
		case 11:
		case 12:
			return "ganjil";
			break;
	}
}

function cari_th_akademik(){
	date_default_timezone_set('Asia/Jakarta');

	$th = date ('Y');
	$smt = cari_semester();

	if($smt == 'ganjil') {
		$ket = 1;
	} else {
		$ket = 2;
	}

	$hasil = $th . $ket;
}
?>
