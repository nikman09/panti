<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_probi');
	    $this->load->model('model_pegawai');
	    $this->load->model('model_rombel');
	    $this->load->model('model_tahunakademik');
	}


	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'Pembinaan'; 
			$d['judul'] = 'Jadwal Program Pembinaan';

			$this->db->group_by("kd_probi");
			$data = $this->db->get('jadwal');

			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'jadwal/view_data';
			$d['data'] = $data;// mengambil semua data program pembinaan
			$d['wali_probi'] = $this->model_pegawai->all();
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}

	public function tambah(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['judul'] = "Jadwal Program Pembinaan";
			$d['class'] = "Pembinaan";
			$d['probi'] = $this->model_probi->data_probi();

			$d['pegawai'] = $this->model_pegawai->all();
			$d['content'] = 'jadwal/form';
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(data('Y-m-d'));

			$d['hari_belajar'] = hari_belajar();
			$d['jam_belajar'] = jam_belajar();
			$d['ruang_belajar'] = ruang_belajar();

			$this->load->view('home', $d);
		} else {
			redirect('login','refresh');
		}
		
	}

	

	

}