<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {	
	 
	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	}

	public function index()
	{
		//var_dump($this->session->userdata("username"));
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');

		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'home'; 
			$d['judul'] = 'Dashboard';
			$d['content'] = 'isi';


			$this->load->view('home', $d);
		} else {

			redirect('login', 'refresh');
		
		}
	}

	public function laporan()
	{
		//var_dump($this->session->userdata("username"));
		
			$this->load->view('laporan/v_laporan');
	
	}
	
}