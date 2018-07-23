<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transkrip extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
		$this->load->model('model_transkrip');
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
			$d['class'] = 'Pembinaan'; 
			$d['judul'] = 'Transkrip';
			$d['nama_klien'] = $this->session->userdata('nama_klien');
			$d['content'] = 'transkrip/klien';
			$d['data'] = $this->model_transkrip->dataklien();
			$this->load->view('home', $d);	
		
	}

	public function nilai(){
		$id = $this->uri->segment(3);
		$data = $this->model_transkrip->cekklien($id);
		if ($data->num_rows()>0) {
			$data = $data->row();
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'Pembinaan'; 
			$d['judul'] = 'Transkrip Nilai '.$data->nama_klien.' | '.$data->nir.'';
			$d['nama_klien'] = $this->session->userdata('nama_klien');
			$d['content'] = 'transkrip/nilai';
			$d['data'] =$data ;
			$d['datanilai'] =$this->model_transkrip->datanilai($id);
			$this->load->view('home', $d);	
		}  else {
		redirect('transkrip','refresh');	
		}
	}

	public function asrama(){
		$id = $this->uri->segment(3);
		$data = $this->model_transkrip->cekklien($id);
		if ($data->num_rows()>0) {
			$data = $data->row();
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'Pelayanan'; 
			$d['judul'] = 'Transkrip Asrama '.$data->nama_klien.' | '.$data->nir.'';
			$d['nama_klien'] = $this->session->userdata('nama_klien');
			$d['content'] = 'transkrip/asrama';
			$d['data'] =$data ;
			$d['dataasrama'] =$this->model_transkrip->dataasrama($id);
			$this->load->view('home', $d);	
		}  else {
		redirect('transkrip','refresh');	
		}
	}

	public function rombel(){
		$id = $this->uri->segment(3);
		$data = $this->model_transkrip->cekklien($id);
		if ($data->num_rows()>0) {
			$data = $data->row();
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'Pembinaan'; 
			$d['judul'] = 'Transkrip Kelompok Belajar '.$data->nama_klien.' | '.$data->nir.'';
			$d['nama_klien'] = $this->session->userdata('nama_klien');
			$d['content'] = 'transkrip/rombel';
			$d['data'] =$data ;
			$d['datarombel'] =$this->model_transkrip->datarombel($id);
			$this->load->view('home', $d);	
		}  else {
		redirect('transkrip','refresh');	
		}
	}


	public function cetaknilai(){
		$id = $this->uri->segment(3);
		$data = $this->model_transkrip->cekklien($id);
		if ($data->num_rows()>0) {
			$data = $data->row();
			$d['data'] =$data ;
			$d['datanilai'] =$this->model_transkrip->datanilai($id);
			$this->load->view('transkrip/v_cetaknilai',$d);
		}  else {
		redirect('transkrip','refresh');	
		}
	}

}