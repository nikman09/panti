<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_transkrip extends CI_Model {

	public function dataklien(){
		//mengambil smua data program
		$this->db->where('status !=','calon');
		$this->db->order_by('id_klien');
		$q = $this->db->get('klien');
		return $q->result();	
	}

	public function cekklien($id_klien){
		//mengambil smua data program
		$this->db->where('id_klien',$id_klien);
		return  $this->db->get('klien');
	}
	public function datanilai($id_klien){
		$this->db->from('nilai')
		->join('rombel','nilai.id_rombel = rombel.id_rombel')
		->join('tahunakademik','nilai.id_tahunakademik = tahunakademik.id_tahunakademik')
		->join('klien','nilai.id_klien = klien.id_klien')
		->join('mapel','nilai.kd_mp =  mapel.kd_mp')
		->where('nilai.id_klien',$id_klien);
		return  $this->db->get();
	}

	public function dataasrama($id_klien){
		$this->db->from('riwayat_penempatan')
		->where('id_klien',$id_klien);
		return  $this->db->get();
	}

	public function datarombel($id_klien){
		$this->db->from('penentuan_rombel')
		->join('rombel','penentuan_rombel.id_rombel = rombel.id_rombel','inner')
		->join('klien','penentuan_rombel.id_klien = klien.id_klien','inner')
		->join('tahunakademik','penentuan_rombel.id_tahunakademik = tahunakademik.id_tahunakademik','inner')
		->join('probi','rombel.kd_probi = probi.kd_probi','inner')
		->where('penentuan_rombel.id_klien',$id_klien);
		return  $this->db->get();
	}
	
}

?>