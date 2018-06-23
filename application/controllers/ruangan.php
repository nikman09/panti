<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruangan extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_ruangan');

	}


	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'master'; 
			$d['judul'] = 'Ruangan Kelas';
			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'ruangan/view';
			$d['data'] = $this->model_ruangan->all();
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}

	public function simpan() {
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['kd_ruangan'] = $this->input->post('kode');
			$dt['kd_ruangan'] = $this->input->post('kode');
			$dt['nama_ruangan'] = $this->input->post('ruangan');


			if ($this->model_ruangan->ada($id)) {
				$this->model_ruangan->update($id, $dt);
				echo "Data Sukses Disimpan";
			} else {
				$this->model_ruangan->insert($id, $dt);
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
			$id['kd_ruangan'] = $this->uri->segment(3);

			if ($this->model_ruangan->ada($id)) {
				
				$this->model_ruangan->delete($id);
			} 
			redirect('ruangan','refresh');
		} else {
			redirect('login','refresh');
		}	
	}

	public function cari(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['kd_ruangan'] = $this->uri->segment(3);

			if ($this->model_ruangan->ada($id)){
				$dt = $this->model_ruangan->get($id);
				$d['kode'] = $dt->kd_ruangan;
				$d['ruangan'] = $dt->nama_ruangan;
			} else {
				$d['kode'] = "";
				$d['ruangan'] = "";
			}

			echo json_encode($d);
		} else {
			redirect('login', 'refresh');
		}

	}

}