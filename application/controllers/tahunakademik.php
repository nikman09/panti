<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tahunakademik extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_tahunakademik');


	}


	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'master'; 
			$d['judul'] = 'Tahun Akademik';
			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'tahunakademik/view';
			$d['data'] = $this->model_tahunakademik->all();
			
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}

	public function simpan() {
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['id_tahunakademik'] = $this->input->post('id');
			$dt['tahunakademik'] = $this->input->post('tahunakademik');
			$dt['status'] = $this->input->post('status');



			if ($this->model_tahunakademik->ada($id)) {
				$this->model_tahunakademik->update($id, $dt);
				echo "Data Sukses Disimpan";
				if ($dt['status']=="Aktif") {
					$data['status'] = "Tidak Aktif";
					$this->model_tahunakademik->ganti($id['id_tahunakademik'], $data);
				} 
			} else {
				$this->model_tahunakademik->insert($dt);
				$idd = $this->db->insert_id();
				if ($dt['status']=="Aktif") {
					$data['status'] = "Tidak Aktif";
					$this->model_tahunakademik->ganti($idd, $data);
				} 
				echo "Data Sukses Disimpan ";

			}
				
		} else {
			redirect('login','refresh');
		}
	}

	public function hapus(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['id_tahunakademik'] = $this->uri->segment(3);

			if ($this->model_tahunakademik->ada($id)) {
				
				$this->model_tahunakademik->delete($id);
			} 
			redirect('tahunakademik','refresh');
		} else {
			redirect('login','refresh');
		}	
	}

	public function cari(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['id_tahunakademik'] = $this->uri->segment(3);

			if ($this->model_tahunakademik->ada($id)){
				$dt = $this->model_tahunakademik->get($id);
				$d['id'] = $dt->id_tahunakademik;
				$d['tahunakademik'] = $dt->tahunakademik;
				$d['status'] = $dt->status;
				
			} else {
				$d['id'] = "";
				$d['tahunakademik'] = "";
				$d['status'] = "";
			}

			echo json_encode($d);
		} else {
			redirect('login', 'refresh');
		}

	}

}