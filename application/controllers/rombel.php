<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rombel extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_rombel');
	    $this->load->model('model_probi');

	}


	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'Master'; 
			$d['judul'] = 'Kelompok Belajar';
			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'rombel/view';
			$d['data'] = $this->model_rombel->all();
			$d['probi'] = $this->model_probi->all2();
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}

	public function simpan() {
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['id_rombel'] = $this->input->post('id');
			$dt['id_rombel'] = $this->input->post('id');
			$dt['rombel'] = $this->input->post('rombel');
			$dt['kelas'] = $this->input->post('kelas');
			$dt['kd_probi'] = $this->input->post('probi'); 

 

			if ($this->model_rombel->ada($id)) {
				$this->model_rombel->update($id, $dt);
				echo "Data Sukses Disimpan";
			} else {
				$this->model_rombel->insert($id, $dt);
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
			$id['id_rombel'] = $this->uri->segment(3);

			if ($this->model_rombel->ada($id)) {
				
				$this->model_rombel->delete($id);
			} 
			redirect('rombel','refresh');
		} else {
			redirect('login','refresh');
		}	
	}

	public function cari(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['id_rombel'] = $this->uri->segment(3);

			if ($this->model_rombel->ada($id)){
				$dt = $this->model_rombel->get($id);
				$d['id'] = $dt->id_rombel;
				$d['rombel'] = $dt->rombel;
				$d['kelas'] = $dt->kelas;
				$d['probi'] = $dt->kd_probi;
			} else {
				$d['id'] = "";
				$d['rombel'] = "";
				$d['kelas'] = "";
				$d['probi'] = "";
			}

			echo json_encode($d);
		} else {
			redirect('login', 'refresh');
		}

	}

}