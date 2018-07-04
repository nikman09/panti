<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_penempatan extends CI_Model {
	
	public function all(){
		$this->db->from('asrama');
		$this->db->join('pegawai','asrama.id_pegawai = pegawai.id_pegawai','left');
		$data = $this->db->get();
		return $data->result();

	}

	public function jumlahklien($kd_asrama){

		$this->db->where('kd_asrama',$kd_asrama);
		$data = $this->db->get('penempatan');
		return $data->num_rows();

	}

	public function cekasrama($kd_asrama){

		$this->db->where('kd_asrama',$kd_asrama);
		$data = $this->db->get('asrama');
		$jumlah = $data->num_rows();
		return $jumlah >0;
	}

	public function cekpenempatan($id_penempatan){

		$this->db->where('id_penempatan',$id_penempatan);
		$data = $this->db->get('penempatan');
		return $data ;
	}
	public function dataklien($kd_asrama){
		$data = $this->db->from('penempatan')
		->join('klien','penempatan.id_klien = klien.id_klien')
		->where('kd_asrama',$kd_asrama)
		->get();
		return $data;

	}
	public function delete($idpenempatan){
		$data = array(
			'id_penempatan' => $idpenempatan
		);
		return $this->db->delete('penempatan',$data);

	}

	public function ambilasrama($kd_asrama){

		$this->db->where('kd_asrama',$kd_asrama);
		$data = $this->db->get('asrama');
		return $data->row() ;
	}

	public function ambilpegawai($id_pegawai){

		$this->db->where('id_pegawai',$id_pegawai);
		$data = $this->db->get('pegawai');
		return $data->row() ;
	}
	public function ambilklien($id_klien){

		$this->db->where('id_klien',$id_klien);
		$data = $this->db->get('klien');
		return $data->row() ;
	}

	public function ambilpenempatan($id_klien){

		$this->db->where('id_klien',$id_klien);
		$data = $this->db->get('penempatan');
		return $data->row() ;
	}

	public function ambilsk($kd_asrama,$id_pegawai){
		$this->db->where('kd_asrama',$kd_asrama);
		$this->db->where('id_pegawai',$id_pegawai);
		$this->db->order_by('tgl_sk',"desc");
		$this->db->limit(1);  
		$data = $this->db->get('penunjukan');
		return $data->row() ;
	}

	public function ceksk($kd_asrama,$id_pegawai){
		$this->db->where('kd_asrama',$kd_asrama);
		$this->db->where('id_pegawai',$id_pegawai);
		$this->db->order_by('tgl_sk',"desc");
		$this->db->limit(1);  
		$data = $this->db->get('penunjukan');
		return $data->num_rows() >0 ;
	}

	public function daftarasrama($kd_asrama){

		$this->db->where('kd_asrama !=',$kd_asrama);
		$data = $this->db->get('asrama');
		return $data;
	}

	public function daftarklien(){
		return $this->db->query("select * from klien where not exists  (select * from penempatan where klien.id_klien=penempatan.id_klien) and klien.status='aktif'");
	}

	public function tambahklien($data){
		return $this->db->insert("penempatan",$data);
	}

	public function rinciklien($id_penempatan){
		$this->db->join('klien','penempatan.id_klien = klien.id_klien');
		$this->db->where('id_penempatan =',$id_penempatan);
		$data = $this->db->get('penempatan');
		return $data;
	}

	public function update($data,$id){
		$id = array (
			"id_penempatan" => $id
		);
		$this->db->update("penempatan", $data,$id );
	}
	public function tambahriwayat($data){
		return $this->db->insert("riwayat_penempatan",$data);
	}

	public function tambahpenunjukan($data){
		return $this->db->insert("penunjukan",$data);
	}

	public function riwayat(){
		return $this->db->get("riwayat_penempatan")->result();
	}
	
	public function deleteriwayat($id){
		$data = array(
			'id' => $id
		);
		return $this->db->delete('riwayat_penempatan',$data);

	}

	public function riwayatcari($id){
		$this->db->where('id',$id);
		return $this->db->get("riwayat_penempatan");
	}


}

?>