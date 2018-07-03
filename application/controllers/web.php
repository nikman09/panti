<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {	
	 
	public function __construct()
	{
	    parent::__construct();

		$this->load->model('model_data');
		$this->load->model('model_daftarberita');
	}

	public function index()
	{
		$a['berita'] = $this->model_daftarberita->lihatberita3();
		$this->layout->render('beranda/v_web',$a,'beranda/v_web_js');
	}
	
}