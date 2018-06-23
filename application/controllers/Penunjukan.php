<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penunjukan extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_klien');
	    $this->load->model('model_asrama');
		$this->load->model('model_penempatan');
	    $this->load->model('model_penunjukan');
	}


	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'transaksi'; 
			$d['judul'] = 'Riwayat Penunjukan';
			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'penunjukanasrama/penunjukan';
			$d['data'] = $this->model_penunjukan->all();// mengambil semua data program pembinaan
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}
	public function hapusriwayat(){
		$id = $this->uri->segment(3);
		$data = $this->model_penunjukan->riwayatcari($id);
		if ($data->num_rows()>0) {
			$this->model_penunjukan->deleteriwayat($id);
		} 
		redirect('penunjukan?h=1','refresh');	
}

}