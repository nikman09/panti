<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instruktur extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
		$this->load->model('model_pegawai');
		$this->load->model('model_instruktur');
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
		} else {
			redirect('login','refresh');
		}	
	}


	public function index()
	{
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'master'; 
			$d['judul'] = 'Instruktur';
			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'instuktur/view';
			$d['data'] = $this->model_instruktur->all();// mengambil semua data pegawai
			$d['datapegawai'] = $this->model_instruktur->pegawai();
			$this->load->view('home', $d);	
	}
	public function tambahinstruktur(){

			$dt['id_pegawai'] = $this->input->post('pegawai');
			$dt['username'] = $this->input->post('username');
			$dt['password'] = md5($this->input->post('password'));
	
			$this->model_instruktur->tambahinstruktur($dt);
			redirect(site_url('instruktur?a=1'));

	}

	public function hapus(){
		$id['id_instruktur'] = $this->uri->segment(3);
		if ($this->model_instruktur->ada($id)) {
			$this->model_instruktur->delete($id);
		} 
			redirect('instruktur?a=2','refresh');
	}

	public function editinstruktur(){

		$id['id_instruktur'] = $this->input->post('id_instruktur2');
		$dt['password'] = md5($this->input->post('password2'));
		$this->model_instruktur->update($id,$dt);
		redirect(site_url('instruktur?a=3'));

}


}