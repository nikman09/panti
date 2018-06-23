<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asrama extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_asrama');
	}


	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'master'; 
			$d['judul'] = 'Asrama';

			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'asrama/view';
			$d['data'] = $this->model_asrama->all();// mengambil semua data program pembinaan
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}
	public function simpan(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['kd_asrama'] = $this->input->post('kode');

			$dt['kd_asrama'] = $this->input->post('kode');
			$dt['asrama'] = $this->input->post('asrama');
			$dt['kouta'] = $this->input->post('kouta');

			if ($this->model_asrama->ada($id)) {
				
				//$dt['tgl_update'] = date('Y-m-d h:i:s');
				$this->model_asrama->update($id, $dt);
				echo "Data Sukses Disimpan";
			} else {
				//$dt['tgl_insert'] = date('Y-m-d h:i:s');
				$this->model_asrama->insert($id,$dt);
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
			$id['kd_asrama'] = $this->uri->segment(3);

			if ($this->model_asrama->ada($id)) {
				
				$this->model_asrama->delete($id);
			} 
			redirect('asrama','refresh');
		} else {
			redirect('login','refresh');
		}	
	}

	public function cari(){

		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['kd_asrama'] = $this->uri->segment(3);

			if ($this->model_asrama->ada($id)){
				$dt = $this->model_asrama->get($id);

				$d['kode'] = $dt->kd_asrama;
				$d['asrama'] = $dt->asrama;
				$d['kouta'] = $dt->kouta;
				

				
			} else {
				$d['kode'] = "";
				$d['asrama'] = "";
				$d['kouta'] = "";

				
			}

			echo json_encode($d);
		} else {
			redirect('login', 'refresh');
		}

	}

}
