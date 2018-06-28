<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_tahunakademik extends CI_Model {
	public function all(){
		//mengambil smua data program
		$this->db->order_by('id_tahunakademik');
		$q = $this->db->get('tahunakademik');
		return $q->result();	
	}
public function all2(){
		//mengambil smua data program
		return $this->db->get('tahunakademik');
	}
	public function ada($id){
		$q = $this->db->get_where('tahunakademik',$id);
		$row = $q->num_rows();

		return $row > 0;

	}

	public function get($id){
		$q = $this->db->get_where('tahunakademik',$id);
		$row = $q->num_rows();

		if ($row > 0){
			return $q->row();
		} else {
			return null;
		}
	}

	public function update($id, $dt){
		$this->db->update("tahunakademik", $dt, $id);
	}

	public function insert($dt){
		$this->db->insert("tahunakademik", $dt);
	}
	public function delete($id){
		$this->db->delete("tahunakademik", $id);
	}	

	public function ganti($id,$dt){
		$this->db->where("id_tahunakademik !=",$id);
		$this->db->update("tahunakademik", $dt);
	}
}

?>