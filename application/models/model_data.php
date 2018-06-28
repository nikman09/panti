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
		return array('aktif','keluar','lulus','meninggal');
	}

	public function status_pendaftaran(){
		return array('diterima','ditolak');
	}

	public function kelas(){
		return array('A','B','C','D','E','F');
	}

	public function agama(){
		return array('Islam','Kristen Protestan','Katolik','Hindu','Budha','Kong Hu Cu');
	}

	public function kota(){
		return array('Balangan','Banjar','Barito Kuala','Hulu Sungai Selatan','Hulu Sungai Tengah','Hulu Sungai Utara','Kotabaru','Tabalong','Tanah Bumbu','Tanah Laut','Tapin','Banjarbaru','Banjarmasin');
	}
}

?>