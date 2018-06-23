<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pegawai extends CI_Model {
	public function all(){
		//mengambil smua data program
		$this->db->order_by('id_pegawai');
		$q = $this->db->get('pegawai');
		return $q->result();	
	}

	public function all2(){
		return $this->db->get('pegawai');
	}

	public function ada($id){
		$q = $this->db->get_where('pegawai',$id);
		$row = $q->num_rows();

		return $row > 0;
	}
	
	public function get($id){
		$q = $this->db->get_where('pegawai',$id);
		$row = $q->num_rows();

		if ($row > 0){
			return $q->row();
		} else {
			return null;
		}
	}

	public function update($id, $dt){
		$this->db->update("pegawai", $dt, $id);
	}

	public function insert($id, $dt){
		$this->db->insert("pegawai", $dt, $id);
	}
	public function delete($id){
		$this->db->delete("pegawai", $id);
	}


}

?>