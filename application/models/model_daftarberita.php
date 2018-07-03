<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_daftarberita extends CI_Model {
	public function all(){
		
		return $this->db->get('berita');	
	}
	public function tambahberita($daftar){
		
		return $this->db->insert('berita',$daftar);	
	}

	public function hapusberita($id_berita){
		$this->db->where('id_berita',$id_berita);
		return $this->db->delete('berita');	
	}

	public function cariberita($id_berita){
		$this->db->where('id_berita',$id_berita);
		return $this->db->get('berita');	
	}
	public function editberita($id_berita,$data){
		$this->db->where('id_berita',$id_berita);
		return $this->db->update('berita',$data);	
	}


	public function lihatberita3(){
		$this->db->order_by('tanggal','asc');
		return $this->db->get('berita');		
	}

	
}

?>