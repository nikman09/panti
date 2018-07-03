<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
		$this->load->model('model_daftarberita');
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
	
	}


	public function index()
	{
		$d['data'] = $this->model_daftarberita->all();
		$this->layout->render('berita/v_beritadaftar',$d);	
	}

	public function daftar()
	{
		$id_berita = $this->uri->segment(3);
		$d['data'] = $this->model_daftarberita->cariberita($id_berita)->row();
		$this->layout->render('berita/v_rinci',$d);	
	}
}