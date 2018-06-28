<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_penerimaan extends CI_Model {
	public function all(){
		//mengambil smua data program
		$this->db->where('status','calon');
		$this->db->order_by('id_klien');
		$q = $this->db->get('klien');
		return $q->result();	
	}

	public function ada($id){
		$q = $this->db->get_where('klien',$id);
		$row = $q->num_rows();
		return $row > 0;
	}
	public function ambilklien($id_klien){

		$this->db->where('id_klien',$id_klien);
		$data = $this->db->get('klien');
		return $data->row() ;
	}

	public function update($id, $dt){
		$this->db->update("klien", $dt, $id);
	}

}

?>