<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_probi extends CI_Model {
	public function all(){
		//mengambil smua data program
		$this->db->order_by('kd_probi');
		$q = $this->db->get('probi');
		return $q->result();	
	}
public function all2(){
		//mengambil smua data program
		return $this->db->get('probi');
	}
	public function ada($id){
		$q = $this->db->get_where('probi',$id);
		$row = $q->num_rows();

		return $row > 0;

	}

	public function get($id){
		$q = $this->db->get_where('probi',$id);
		$row = $q->num_rows();

		if ($row > 0){
			return $q->row();
		} else {
			return null;
		}
	}

	public function update($id, $dt){
		$this->db->update("probi", $dt, $id);
	}

	public function insert($id, $dt){
		$this->db->insert("probi", $dt, $id);
	}
	public function delete($id){
		$this->db->delete("probi", $id);
	}	
}

?>