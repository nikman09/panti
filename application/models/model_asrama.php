<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_asrama extends CI_Model {
	public function all(){
		//mengambil smua data program
		$this->db->order_by('kd_asrama');
		$q = $this->db->get('asrama');
		return $q->result();	
	}
	public function all2(){
		
		return $this->db->get('asrama');
	}
	public function ada($id){
		$q = $this->db->get_where('asrama',$id);
		$row = $q->num_rows();

		return $row > 0;

	}

	public function get($id){
		$q = $this->db->get_where('asrama',$id);
		$row = $q->num_rows();

		if ($row > 0){
			return $q->row();
		} else {
			return null;
		}
	}

	public function update($id, $dt){
		$this->db->update("asrama", $dt, $id);
	}

	public function insert($dt){
		$this->db->insert("asrama", $dt);
	}
	public function delete($id){
		$this->db->delete("asrama", $id);
	}

	
}

?>