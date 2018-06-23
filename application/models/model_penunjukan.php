<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_penunjukan extends CI_Model {
	

	public function all(){
		$this->db->join('pegawai','penunjukan.id_pegawai = pegawai.id_pegawai','left');
		$this->db->join('asrama','penunjukan.kd_asrama = asrama.kd_asrama','left');
		$this->db->order_by('id_penunjukan','desc');
		$data = $this->db->get('penunjukan');
		return $data->result();
	}

	public function deleteriwayat($id){
		$data = array(
			'id_penunjukan' => $id
		);
		return $this->db->delete('penunjukan',$data);

	}

	public function riwayatcari($id){
		$this->db->where('id_penunjukan',$id);
		return $this->db->get("penunjukan");
	}


}

?>