<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_klien extends CI_Model {

	public function tahunini(){
		$this->db->where('status','Aktif');
		$data = $this->db->get('tahunakademik')->row();
		return $data;
   }
	public function all(){
		//mengambil smua data program
		$this->db->where('status !=','calon');
		$this->db->order_by('id_klien');
		$q = $this->db->get('klien');
		return $q->result();	
	}

	

	public function ada($id){
		$q = $this->db->get_where('klien',$id);
		$row = $q->num_rows();

		return $row > 0;

	}

	public function get($id){
		$q = $this->db->get_where('klien',$id);
		$row = $q->num_rows();

		if ($row > 0){
			return $q->row();
		} else {
			return null;
		}
	}

	public function getperkabupaten($kota){
		$tahunini = $this->tahunini()->id_tahunakademik;
		$this->db->from('klien');
		$this->db->join('(select * from penentuan_rombel where id_tahunakademik='.$tahunini.' ) as penentuan','penentuan.id_klien = klien.id_klien','left');
		$this->db->join('rombel','rombel.id_rombel = penentuan.id_rombel','left');
		$this->db->where('kota',$kota);
		$this->db->where('status !=','calon');
		$this->db->group_by('klien.id_klien');
		$this->db->order_by('klien.id_klien');
		$q = $this->db->get();
		return $q->result();	
	}

	public function getall(){
		$tahunini = $this->tahunini()->id_tahunakademik;
		$this->db->from('klien');
		$this->db->join('(select * from penentuan_rombel where id_tahunakademik='.$tahunini.' ) as penentuan','penentuan.id_klien = klien.id_klien','left');
		$this->db->join('rombel','rombel.id_rombel = penentuan.id_rombel','left');
		$this->db->where('status !=','calon');
		$this->db->group_by('klien.id_klien');
		$this->db->order_by('klien.id_klien');
		$q = $this->db->get();
		return $q->result();	
	}


	public function update($id, $dt){
		$this->db->update("klien", $dt, $id);
	}

	public function insert($dt){
		$this->db->insert("klien", $dt);
	}
	public function delete($id){
		$this->db->delete("klien", $id);
	}

	public function data_all_klien(){
		$this->db->where('status', 'aktif');
		$this->db->order_by('id_klien');
		$q = $this->db->get('klien');
	}

	public function get_by_id_klien($id_klien){
		$id['id_klien'] = $id_klien;
		$q = $this->db->get_where('klien', $id);

		if ($q->num_rows() > 0){
			return $q->row();
		} else {
			return null;
		}
	}

	public function get_id_klien(){
		$this->db->order_by('id_klien','desc');
		$this->db->limit('1');
		$q = $this->db->get('id_klien');
		$d = $q->row_array();
		$a = $d['id_klien'];
		return ++$a;
	}

	public function tampildataasrama($id){
		$this->db->where('kd_asrama',$id);
		$q = $this->db->get('asrama');
		if($q->num_rows()>0){
			foreach ($q->result() as $dt) {
				$hasil = $dt->asrama;
			}
		} else {
			$hasil = '';
		}
		return $hasil;
	}


	public function carinik($nik){
	     $this->db->where('nik', $nik);
		return $this->db->get('klien');
	}
	public function daftar($data){
		$this->db->insert("klien", $data);
	}
	public function ada2($id){
		 $this->db->where('id_klien',$id);
		$q = $this->db->get('klien');
		$row = $q->num_rows();

		return $row > 0;

	}

}

?>