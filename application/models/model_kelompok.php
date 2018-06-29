<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_kelompok extends CI_Model {

	public function tahunini(){
		$this->db->where('status','Aktif');
		$data = $this->db->get('tahunakademik')->row();
		return $data;
   }
	
	public function jumlahklien($id_rombel){
		$tahunini = $this->tahunini()->id_tahunakademik;
		$this->db->from('penentuan_rombel');
		$this->db->where('id_rombel',$id_rombel);
		$this->db->where('id_tahunakademik',$tahunini);
		$data = $this->db->get();
		return $data->num_rows();
	}

	public function cekrombel($id_rombel){
		$this->db->where('id_rombel',$id_rombel);
		$data = $this->db->get('rombel');
		$jumlah = $data->num_rows();
		return $jumlah >0;
	}

	public function ambilrombel($id_rombel){
		$this->db->where('id_rombel',$id_rombel);
		$data = $this->db->get('rombel');
		return $data->row() ;
	}

	public function dataklien($id_rombel){
		$tahunini = $this->tahunini()->id_tahunakademik;
		$data = $this->db->from('penentuan_rombel')
		->join('klien','penentuan_rombel.id_klien = klien.id_klien')
		->where('id_rombel',$id_rombel)
		->where('id_tahunakademik',$tahunini)
		->get();
		return $data;
	}

	public function tambahklien($data){
		return $this->db->insert("penentuan_rombel",$data);
	}

	public function daftarklien(){
		$tahunini = $this->tahunini()->id_tahunakademik;
		return $this->db->query("select * from klien where not exists  (select * from penentuan_rombel where klien.id_klien=penentuan_rombel.id_klien and penentuan_rombel.id_tahunakademik=$tahunini ) and klien.status='aktif'");
	}

	public function cekkelompok($id_kelompok){

		$this->db->where('id_penentuan',$id_kelompok);
		$data = $this->db->get('penentuan_rombel');
		return $data ;
	}

	public function delete($idkelompok){
		$data = array(
			'id_penentuan' => $idkelompok
		);
		return $this->db->delete('penentuan_rombel',$data);

	}
}

?>