<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Probi extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_probi');

	}


	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'master'; 
			$d['judul'] = 'Program Pembinaan';
			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'probi/view';
			$d['data'] = $this->model_probi->all();// mengambil semua data program pembinaan
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}
	public function simpan(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['kd_probi'] = $this->input->post('kode');
			$dt['kd_probi'] = $this->input->post('kode');
			$dt['probi'] = $this->input->post('probi');

			if ($this->model_probi->ada($id)) {
				$this->model_probi->update($id, $dt);
				echo "Data Sukses Disimpan";
			} else {
				$this->model_probi->insert($id,$dt);
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
			$id['kd_probi'] = $this->uri->segment(3);

			if ($this->model_probi->ada($id)) {
				
				$this->model_probi->delete($id);
			} 
			redirect('probi','refresh');
		} else {
			redirect('login','refresh');
		}	
	}

	public function cari(){

		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['kd_probi'] = $this->uri->segment(3);

			if ($this->model_probi->ada($id)){
				$dt = $this->model_probi->get($id);
				$d['kode'] = $dt->kd_probi;
				$d['probi'] = $dt->probi;				
			} else {
				$d['kode'] = "";
				$d['probi'] = "";
			}

			echo json_encode($d);
		} else {
			redirect('login', 'refresh');
		}

	}

}