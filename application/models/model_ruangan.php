<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ruangan extends CI_Model {
	public function all(){
		//mengambil smua data program
		$this->db->order_by('kd_ruangan');
		$q = $this->db->get('ruangan');
		return $q->result();	
	}

	public function ada($id){
		$q = $this->db->get_where('ruangan',$id);
		$row = $q->num_rows();

		return $row > 0;

	}

	public function get($id){
		$q = $this->db->get_where('ruangan',$id);
		$row = $q->num_rows();

		if ($row > 0){
			return $q->row();
		} else {
			return null;
		}
	}

	public function update($id, $dt){
		$this->db->update("ruangan", $dt, $id);
	}

	public function insert($id, $dt){
		$this->db->insert("ruangan", $dt, $id);
	}
	public function delete($id){
		$this->db->delete("ruangan", $id);
	}

}

?>