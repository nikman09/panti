<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_instruktur extends CI_Model {
	
	public function all(){
		$this->db->join('pegawai','instruktur.id_pegawai = pegawai.id_pegawai');
		return $this->db->get('instruktur');
	}

	public function pegawai(){
		return $this->db->query("select * from pegawai where not exists  (select * from instruktur where pegawai.id_pegawai=instruktur.id_pegawai) ");
	}

	public function tambahinstruktur($data){
		return $this->db->insert("instruktur",$data);
	}

	public function ada($id){
		$q = $this->db->get_where('instruktur',$id);
		$row = $q->num_rows();
		return $row > 0;
	}
	public function delete($id){
		$this->db->delete("instruktur", $id);
	}
	public function update($id, $dt){
		$this->db->update("instruktur", $dt, $id);
	}

	
	
}

?>