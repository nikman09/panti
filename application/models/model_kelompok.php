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
	
	
	public function ambilmapel(){
		return $this->db->get('mapel');
	}
	
	public function ambildatainstruktur(){
		$this->db->join('pegawai','instruktur.id_pegawai = pegawai.id_pegawai');
		return $this->db->get('instruktur');
	}

	public function ambildataruangan(){
		return $this->db->get('ruangan');
	}
	public function tambahjadwal($data){
		return $this->db->insert("jadwal",$data);
	}

	public function ambiljadwal($hari,$id_rombel){
		$tahunini = $this->tahunini()->id_tahunakademik;
		$this->db->from('jadwal');
		$this->db->join('mapel','mapel.kd_mp = jadwal.kd_mapel');
		$this->db->join('ruangan','ruangan.kd_ruangan = jadwal.kd_ruangan');
		$this->db->join('instruktur','instruktur.id_instruktur = jadwal.id_instruktur');
		$this->db->join('pegawai','pegawai.id_pegawai = instruktur.id_pegawai');
		$this->db->where('id_rombel',$id_rombel);
		$this->db->where('hari',$hari);
		$this->db->where('id_tahunakademik',$tahunini);
		$this->db->order_by('jam','asc');
		return $this->db->get();
	}

	public function cekjadwal($id_jadwal){

		$this->db->where('id_jadwal',$id_jadwal);
		$data = $this->db->get('jadwal');
		return $data ;
	}
	public function hapusjadwal($id_jadwal){
		$data = array(
			'id_jadwal' => $id_jadwal
		);
		return $this->db->delete('jadwal',$data);
	}

	public function cetakjadwal($id_rombel){
		$tahunini = $this->tahunini()->id_tahunakademik;
		return $this->db->query("SELECT jadwal.jam , ksenin.mapel as mpsenin, kselasa.mapel as mpselasa, krabu.mapel as mprabu, kkamis.mapel as mpkamis, kjumat.mapel as mpjumat, ksabtu.mapel as mpsabtu, kminggu.mapel as mpminggu FROM jadwal 
			left join (select id_jadwal, kd_mapel, mapel   from jadwal inner join mapel on mapel.kd_mp = jadwal.kd_mapel where hari='senin') as ksenin on ksenin.id_jadwal = jadwal.id_jadwal  
	 		left join (select id_jadwal, kd_mapel, mapel   from jadwal inner join mapel on mapel.kd_mp = jadwal.kd_mapel where hari='selasa') as kselasa on kselasa.id_jadwal = jadwal.id_jadwal  
	 	 	left join (select id_jadwal, kd_mapel, mapel   from jadwal inner join mapel on mapel.kd_mp = jadwal.kd_mapel where hari='rabu') as krabu on krabu.id_jadwal = jadwal.id_jadwal  
	  		left join (select id_jadwal, kd_mapel, mapel   from jadwal inner join mapel on mapel.kd_mp = jadwal.kd_mapel where hari='kamis') as kkamis on kkamis.id_jadwal = jadwal.id_jadwal  
	  		left join (select id_jadwal, kd_mapel, mapel   from jadwal inner join mapel on mapel.kd_mp = jadwal.kd_mapel where hari='jumat') as kjumat on kjumat.id_jadwal = jadwal.id_jadwal 
			left join (select id_jadwal, kd_mapel, mapel   from jadwal inner join mapel on mapel.kd_mp = jadwal.kd_mapel where hari='sabtu') as ksabtu on ksabtu.id_jadwal = jadwal.id_jadwal 
			left join (select id_jadwal, kd_mapel, mapel   from jadwal inner join mapel on mapel.kd_mp = jadwal.kd_mapel where hari='minggu') as kminggu on kminggu.id_jadwal = jadwal.id_jadwal 
		where id_rombel='$id_rombel' and id_tahunakademik='$tahunini' group by jam");
	}

	public function cetakabsensiinstruktur($id_rombel,$hari){
		$tahunini = $this->tahunini()->id_tahunakademik;
		return $this->db->query("SELECT pegawai.nama_pegawai, mapel.mapel, jadwal.jam  FROM `jadwal` inner join mapel on mapel.kd_mp = jadwal.kd_mapel inner join instruktur on instruktur.id_instruktur = jadwal.id_instruktur inner join pegawai on pegawai.id_pegawai = instruktur.id_pegawai   WHERE jadwal.id_rombel ='$id_rombel' and jadwal.id_tahunakademik='$tahunini' and hari='$hari'");
	}

}

?>