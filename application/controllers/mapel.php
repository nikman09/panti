<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapel extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_mapel');

	}


	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'Master'; 
			$d['judul'] = 'Mata Pelajaran';
			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'mapel/view';
			$d['data'] = $this->model_mapel->all();
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}

	public function simpan() {
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['kd_mp'] = $this->input->post('kode');
			$dt['kd_mp'] = $this->input->post('kode');
			$dt['mapel'] = $this->input->post('mapel');


			if ($this->model_mapel->ada($id)) {
				$this->model_mapel->update($id, $dt);
				echo "Data Sukses Disimpan";
			} else {
				$this->model_mapel->insert($id, $dt);
				echo "Data Sukses Disimpan";
			}

		} else {
			redirect('login','refresh');
		}
	}

	public function hapus(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['kd_mp'] = $this->uri->segment(3);

			if ($this->model_mapel->ada($id)) {
				
				$this->model_mapel->delete($id);
			} 
			redirect('mapel','refresh');
		} else {
			redirect('login','refresh');
		}	
	}

	public function cari(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['kd_mp'] = $this->uri->segment(3);

			if ($this->model_mapel->ada($id)){
				$dt = $this->model_mapel->get($id);
				$d['kode'] = $dt->kd_mp;
				$d['mapel'] = $dt->mapel;
			} else {
				$d['kode'] = "";
				$d['mapel'] = "";
			}

			echo json_encode($d);
		} else {
			redirect('login', 'refresh');
		}

	}

}