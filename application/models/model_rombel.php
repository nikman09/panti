<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_rombel extends CI_Model {
	public function all(){
		//mengambil smua data program
		$this->db->order_by('id_rombel');
		$q = $this->db->get('rombel');
		return $q->result();	
	}

	public function all2(){
		//mengambil smua data program
		return $this->db->get('rombel');
	}

	public function ada($id){
		$q = $this->db->get_where('rombel',$id);
		$row = $q->num_rows();

		return $row > 0;

	}

	public function get($id){
		$q = $this->db->get_where('rombel',$id);
		$row = $q->num_rows();

		if ($row > 0){
			return $q->row();
		} else {
			return null;
		}
	}

	public function update($id, $dt){
		$this->db->update("rombel", $dt, $id);
	}

	public function insert($id, $dt){
		$this->db->insert("rombel", $dt, $id);
	}
	public function delete($id){
		$this->db->delete("rombel", $id);
	}
	public function tampildatarombel($id){
		$this->db->where('kd_probi',$id);
		$q = $this->db->get('probi');
		if($q->num_rows()>0){
			foreach ($q->result() as $dt) {
				$hasil = $dt->probi;
				# code...
			}
		} else {
			$hasil = '';
		}
		return $hasil;
	}

}

?>