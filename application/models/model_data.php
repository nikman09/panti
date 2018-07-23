<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_data extends CI_Model {
	public function jml_data($table){
		$q = $this->db->get($table);
		$jumlah = $q->num_rows();
		return $jumlah;
	}

	public function cari_foto_username($username){
		$where['username'] = $username;
		$q = $this->db->get_where('admins', $where);
		$r = $q->row();
		return $r->foto;
	}

	public function jenjang_pendidikan(){
		return array('SD / Sederajat','SMP / Sederajat','SMA / Sederajat', 'D3', 'S1', 'S2', 'S3');
	}

	public function status_pegawai(){
		return array('PNS','Kontrak');
	}

	public function status_klien(){
		return array('Calon','Aktif','Keluar','Lulus');
	}

	public function status_pendaftaran(){
		return array('Diterima','Ditolak');
	}

	public function kelas(){
		return array('A','B','C','D','E','F');
	}

	public function agama(){
		return array('Islam','Kristen Protestan','Katolik','Hindu','Budha','Kong Hu Cu');
	}

	public function kota(){
		return array('BALANGAN','BANJAR','BARITO KUALA','HULU SUNGAI SELATAN','HULU SUNGAI TENGAH','HULU SUNGAI UTARA','KOTABARU','TABALONG','TANAH BUMBU','TANAH LAUT','TAPIN','BANJARBARU','BANJARMASIN');
	}
}

?>