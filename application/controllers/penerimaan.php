<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penerimaan extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_klien');
	}


	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'transaksi'; 
			$d['judul'] = 'Penerimaan Klien';
			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'klien/viewpenerimaan';
			$d['data'] = $this->model_klien->all();
			
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}

	/* public function simpan() {
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['id_klien'] = $this->input->post('id');
			$dt['id_tahunakademik'] = $this->input->post('id');
			$dt['tahunakademik'] = $this->input->post('tahunakademik');
			$dt['status'] = $this->input->post('status');



			if ($this->model_tahunakademik->ada($id)) {
				$this->model_tahunakademik->update($id, $dt);
				echo "Data Sukses Disimpan";
			} else {
				$this->model_tahunakademik->insert($id, $dt);
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
			$id['id_tahunakademik'] = $this->uri->segment(3);

			if ($this->model_tahunakademik->ada($id)) {
				
				$this->model_tahunakademik->delete($id);
			} 
			redirect('tahunakademik','refresh');
		} else {
			redirect('login','refresh');
		}	
	}*/

	public function cari(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['id_klien'] = $this->uri->segment(3);

			if ($this->model_klien->ada($id)){
				$dt = $this->model_klien->get($id);
				$d['id'] = $dt->id_klien;
				$d['tahunakademik'] = $dt->klien;
				$d['status'] = $dt->status;
				
			} else {
				$d['id'] = "";
				$d['klien'] = "";
				$d['status'] = "";
			}

			echo json_encode($d);
		} else {
			redirect('login', 'refresh');
		}

	}

}