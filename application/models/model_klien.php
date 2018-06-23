<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_klien extends CI_Model {
	public function all(){
		//mengambil smua data program
		$this->db->order_by('id_klien');
		$q = $this->db->get('klien');
		return $q->result();	
	}

	

	public function ada($id){
		$q = $this->db->get_where('klien',$id);
		$row = $q->num_rows();

		return $row > 0;

	}

	public function get($id){
		$q = $this->db->get_where('klien',$id);
		$row = $q->num_rows();

		if ($row > 0){
			return $q->row();
		} else {
			return null;
		}
	}

	public function update($id, $dt){
		$this->db->update("klien", $dt, $id);
	}

	public function insert($id, $dt){
		$this->db->insert("klien", $dt, $id);
	}
	public function delete($id){
		$this->db->delete("klien", $id);
	}

	public function data_all_klien(){
		$this->db->where('status', 'aktif');
		$this->db->order_by('id_klien');
		$q = $this->db->get('klien');
	}

	public function get_by_id_klien($id_klien){
		$id['id_klien'] = $id_klien;
		$q = $this->db->get_where('klien', $id);

		if ($q->num_rows() > 0){
			return $q->row();
		} else {
			return null;
		}
	}

	public function get_id_klien(){
		$this->db->order_by('id_klien','desc');
		$this->db->limit('1');
		$q = $this->db->get('id_klien');
		$d = $q->row_array();
		$a = $d['id_klien'];
		return ++$a;
	}

	public function tampildataasrama($id){
		$this->db->where('kd_asrama',$id);
		$q = $this->db->get('asrama');
		if($q->num_rows()>0){
			foreach ($q->result() as $dt) {
				$hasil = $dt->asrama;
			}
		} else {
			$hasil = '';
		}
		return $hasil;
	}


	public function carinik($nik){
	     $this->db->where('nik', $nik);
		return $this->db->get('klien');
	}
	public function daftar($data){
		$this->db->insert("klien", $data);
	}
	public function ada2($id){
		 $this->db->where('id_klien',$id);
		$q = $this->db->get('klien');
		$row = $q->num_rows();

		return $row > 0;

	}

}

?>